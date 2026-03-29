jQuery(document).ready(function($) {
  // ナビゲーション
  $('.nav-ac-btn').off('click').on('click',function(e){
    $(this).toggleClass('active');
    $(this).next('.nav-ac-content').slideToggle(200);
  });
  $('.menu-toggle-btn').off('click').on('click',function(e){
    console.log(e);
    $('.community-toggle-menu').fadeIn(200);
  });
  $('.menu-close-btn').off('click').on('click',function(e){
    $('.community-toggle-menu').fadeOut(200);
  });

  // コメント削除ボタンがクリックされたときの処理
  $('.delete-comment-button').off('click').on('click', function(e) {
    
    e.preventDefault();
    
    // 削除するコメントのIDを取得
    var commentID = $(this).data('comment-id');

    if (confirm('本当にこのコメントを削除しますか？')) {
        $.ajax({
            url: my_ajax_object.ajaxurl, // WordPressの標準のAjax URL
            type: 'POST',
            data: {
                action: 'delete_comment', // WordPressのAjaxアクション
                comment_id: commentID,
                security: my_ajax_object.delete_nonce // WordPressのセキュリティ用のnonce
            },
            success: function(response) {
                if (response.success) {
                    // 成功した場合、コメントをページから削除
                    $('#comment-' + commentID).remove();
                    alert('コメントが削除されました。');
                } else {
                    alert('コメントの削除に失敗しました。');
                }
            }
        });
    }
  });

  // 編集ボタンがクリックされたときの処理
  $('.edit-comment-button').off('click').on('click', function(e) {
      e.preventDefault();

      var commentID = $(this).data('comment-id');
      var commentContent = $('#comment-content-' + commentID).text();
      
      // フォームに既存のコメント内容をセット
      $('#edit-comment-form textarea').val(commentContent);
      $('#edit-comment-form').attr('data-comment-id', commentID);
      
      // フォームを表示
      const modal = $('#edit-comment-modal');
      modal.css({
          'visibility': "visible",
          'opacity': 1,
      });
      modal.addClass('show');
  });

  // フォームの送信処理
  $('#edit-comment-form').off('submit').on('submit', function(e) {
    e.preventDefault();
    
    var commentID = $(this).data('comment-id');
    var newCommentContent = $('#edit-comment-textarea').val();

    $.ajax({
        url: my_ajax_object.ajaxurl,
        type: 'POST',
        data: {
            action: 'edit_comment',
            comment_id: commentID,
            comment_content: newCommentContent,
            security: my_ajax_object.edit_nonce
        },
        success: function(response) {
            
          if (response.success) {
              // 成功した場合、コメント内容を更新
              $('#comment-content-' + commentID).html(newCommentContent.replace(/\n/g, '<br>'));
              closeCommentModal();
          } else {
              alert('コメントの編集に失敗しました。');
          }
        }
    });
  });

  // コメント編集 modal
  $('.comment-modal-close').off('click').on('click', function(e) {
    closeCommentModal();
  });

  function closeCommentModal() {
    const modal = $('#edit-comment-modal');
    modal.css({
      'visibility': "hidden",
      'opacity': 0,
    });
    modal.removeClass('show');
    modal.find('textarea').val('');
  }

  const profileModal = document.getElementById('profile-image-modal');

  // プロフィール画像 modal
  $('.profile-modal-open').on('click', function(e) {
    e.preventDefault();

    const imageContainer = document.getElementById('profile-image-container');
    const nameContainer = document.getElementById('profile-name-container');
    const imageId = $(this).attr('data-profile-id');
    const userName = $(this).attr('data-profile-name');

    if (imageId) {
      $.ajax({
        url: my_ajax_object.ajaxurl,
        type: 'POST',
        data: {
          action: 'get_image_url', // PHPのAjaxアクション
          image_id: imageId
        },
        success: function(response) {
          if (response.success) {
            // 画像URLを取得し、ページに画像を表示
            const imageUrl = response.data;
            const imgElement = document.createElement('img');
            imgElement.src = imageUrl;
            imgElement.alt = 'Profile Image';

            // 既存の画像を消して新しい画像を表示
            imageContainer.innerHTML = '';
            imageContainer.appendChild(imgElement);

            // ユーザーネームを表示
            nameContainer.innerText = userName;

            const modal = $('#profile-image-modal');
            modal.css({
              'visibility': "visible",
              'opacity': 1,
            });
            modal.addClass('show');
          } else {
            console.log('エラー:', response.data);
          }
        },
        error: function(error) {
          console.error('リクエストエラー:', error);
        }
      });
    }

  });

  $('.profile-modal-close').off('click').on('click', function(e) {
    e.preventDefault();

    closeProfileModal();
  });

  // モーダルの外側をクリックして閉じる
  window.addEventListener('click', function(e) {
    if (e.target == profileModal) {
      closeProfileModal();
    }
  });

  function closeProfileModal() {
    const modal = $('#profile-image-modal');
    modal.css({
      'visibility': "hidden",
      'opacity': 0,
    });
    modal.removeClass('show');
  }

});

document.addEventListener('DOMContentLoaded', function() {
  // プロフィール画像のファイル入力要素を取得
  var profileImageInput = document.getElementById('profile_image');
  var fileNameDisplay = document.getElementById('file-name-display');

  // 画像が選択されたときのイベントハンドラ
  if(profileImageInput) {
    profileImageInput.addEventListener('change', function() {
      var file = profileImageInput.files[0];  // 選択されたファイル
      if (file) {
        fileNameDisplay.textContent = "選択されたファイル: " + file.name;  // ファイル名を表示
      } else {
        fileNameDisplay.textContent = "";  // 何も選択されていない場合、空にする
      }
    });
  }
});


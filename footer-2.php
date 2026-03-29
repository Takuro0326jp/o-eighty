</div><!-- .right-panel -->
</div><!-- .content-panels -->
<div id="edit-comment-modal" class="edit-comment-modal">
  <div class="modal-dialog">
    <div class="modal-container">
      <div class="modal-body">
        <h2>コメントを編集する</h2>
        <form data-comment-id="" id="edit-comment-form" role="form">
          <textarea name="edit-comment" id="edit-comment-textarea" rows="8"></textarea>
          <div class="form-submit">
            <button type="button" class="btn btn-cancel comment-modal-close">キャンセル</button>
            <button type="submit" class="btn btn-submit">編集を保存する</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/community.js?v=1.0.2"></script>
</body>
</html>

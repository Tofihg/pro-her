<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
<div class="row mb-3">
  <div class="col-md-6">
    <h1>Tweets</h1>
  </div>
  <div class="col-md-6">
    <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary pull-right">
      <i class="fa fa-pencil"></i> Add Tweet
    </a>
  </div>
</div>
<?php foreach ($data['posts'] as $post) : ?>
  <div class="card card-body mb-3">
    <h4 class="card-title">
      <?php echo $post->title; ?>
    </h4>
    <div class="bg-light p-2 mb-3">
      Written by
      <?php echo $post->name; ?> on
      <?php echo $post->postCreated; ?>
    </div>
    <p class="card-text">
      <?php echo $post->body; ?>
    </p>
    <div class="like-share my-2">
      <button id="like-button" data-like="<?php echo $post->id; ?>" type="button" class="btn btn-default">
        <i class="fas fa-thumbs-up"></i> Like
        <span id="like-count" data-total="<?php echo $post->likes ?>"><?php echo $post->likes ?? null ?></span>
      </button>
      <button id="share-button" type="button" data-share="<?php echo $post->id; ?>" class=" btn btn-default">
        <i class="fas fa-share"></i> Share
      </button>
    </div>
    <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-dark">More</a>
  </div>
<?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>

<script>
  $(document).ready(function() {
    // test jQuery by hiding an element when the page is loaded
    $('#like-button').click(function() {
      var likeCount = parseInt($('#like-count').html());
      var totalLike = parseInt($('#like-count').data('total'));
      var post_id = $('#like-button').data('like');

      // code to add a new like to the post
      $.ajax({
        type: 'GET',
        url: 'posts/addLike/' + post_id,
        // data: {
        //   post_id: post_id
        // },
        success: function() {
          // code to update the UI to reflect the new like count
          if (totalLike == likeCount)
            $('#like-count').html(likeCount + 1);
          else if (totalLike < likeCount)
            $('#like-count').html(likeCount - 1);
        },
        error: function() {
          alert('Error adding like.');
        }
      });
    });
  });
</script>
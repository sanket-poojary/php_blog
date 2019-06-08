<div id="site_content">


<div id="content">

<?php if($this->session->userdata('user_id'))

{ ?>

<h2><a style="color: green" href="<?=  base_url()?>index.php/blog/new_post/"><span class="glyphicon glyphicon-pencil"></span> Create a new post</a></h2>

<?php } ?>

<!-- insert the page content here -->

<?php 
foreach($posts as $post)

{ ?>

<h2><a style="color:red;" href="<?=  base_url()?>index.php/blog/post/<?=$post['post_id']?>"><?=$post['post_title']?></a></h2>

<?php if( $this->session->userdata('user_id') && ($this->session->userdata('user_id') == $post['user_id'] || $this->session->userdata('user_type') == 'admin' ))

{ 
	?>

<p>

<a style="color:blue;" href="<?=  base_url()?>index.php/blog/editpost/<?=$post['post_id']?>"><span class="glyphicon glyphicon-edit" title="Edit post">Edit Post</span></a> |

<a style="color:black;" href="<?=  base_url()?>index.php/blog/deletepost/<?=$post['post_id']?>"><span style="color:#f77;" class="glyphicon glyphicon-remove-circle" title="Delete post">Delete Post</span></a>

</p>

<?php }?>

<p><?=  substr(strip_tags($post['post']), 0, 200).'...';?></p>

<p><a href="<?=  base_url()?>index.php/blog/post/<?=$post['post_id']?>">Read More</a></p>

<?php

}?>


</div>

</div>

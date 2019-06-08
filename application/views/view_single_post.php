<div id="site_content">

<div id="content">

<!-- insert the page content here -->

<?php if(!isset($post))
{
echo "This page was accessed incorrectly";
}

else //display the post
{
?>

<h2><?=$post['post_title']?></h2>

<p><?=$post['post']?></p>

<?php   
}
?>

</div>
</div>

<?php
$emailHeaders = [
	'from'    => 'Naturally Anna <mailgun@'.$domain.'>',
	'to'      => '<camhovell@gmail.com>',
	'subject' => 'Thanks for suggesting '.$title
];
?>
Hi there,

"<?=$email?>" has requested to add the the movie "<?=$title?>" to Naturally Anna. Please review and make a decision

<?php if ($newsletter):?>
They also signed up for the newsletter.
<?php endif;?>

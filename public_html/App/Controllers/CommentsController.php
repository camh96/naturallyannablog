<?php

namespace App\Controllers;

use App\Models\Comment;


class CommentsController extends Controller {
	public function create() {
		$input           = $_POST;
		$input['userID'] = static ::$auth->user()->id;

		$newcomment = new Comment(trim($input));

		if (!$newcomment->isValid()) {
			$_SESSION['comment.form'] = $newcomment;
			header("Location: ./?page=blog.post&id=".$newcomment->movieID."#comment");
			exit();
		}

		$newcomment->save();
		header("Location: ./?page=blog.post&id=".$newcomment->movieID."#comment-".$newcomment->id);
	}
}

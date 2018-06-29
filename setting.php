<?php

class Setting {
	public function getChannelAccessToken(){
		$channelAccessToken = "cVEzC6zHrhzVc5gHgNwQ4LhEi/4w+uGMqTaJEtYFWNmtiobUlcMOkab5Ay2sHA7OXxxozIhjQ1h5ikQkVUQHZv4eld7MGeUR7Vu++UvHRZB7s0ykSwwLjf5ilqwyLPej9SPZk3s3bfyQzHEqmwlcSAdB04t89/1O/w1cDnyilFU=";
		return $channelAccessToken;
	}
	public function getChannelSecret(){
		$channelSecret = "5532695f618d2202f4b24527c9bf74cb";
		return $channelSecret;
	}
	public function getApiReply(){
		$api = "https://api.line.me/v2/bot/message/reply";
		return $api;
	}
	public function getApiPush(){
		$api = "https://api.line.me/v2/bot/message/push";
		return $api;
	}
}

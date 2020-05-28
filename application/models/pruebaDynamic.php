<?php

    //$requestBody = file_get_contents('php://input');
    //$json = json_decode($requestBody);

    //$intent = $json->queryResult->intent->displayName;

    //$response = new \stdClass();
    //echo json_encode($response);
	echo '{
  "version": "v2",
  "content": {
    "messages": [
      {
        "type": "cards",
        "elements": [
          {
            "title": "Card title",
            "subtitle": "card text",
            "image_url": "https://manybot-thumbnails.s3.eu-central-1.amazonaws.com/ca/xxxxxxzzzzzzzzz.png",
            "action_url": "https://manychat.com",
            "buttons": []
          }
        ],
        "image_aspect_ratio": "horizontal"
      }
    ],
    "actions": [],
    "quick_replies": []
  }
}'
?>
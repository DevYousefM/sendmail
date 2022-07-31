<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $name = htmlspecialchars($_POST["name"]);
  $email = htmlspecialchars($_POST["email"]);
  $phone = htmlspecialchars($_POST["phone"]);
  $website = htmlspecialchars($_POST["website"]);
  $message = htmlspecialchars($_POST["message"]);

  if (!empty($message) && !empty($email)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $receiver = "joseph01145119185@gmail.com";
      $subject = "Message From: $name <$email>";
      $body = "Name: $name\nEmail: $email\nPhone: $phone\nWebsite: $website\n\nMessage:\n$message\n\nRegards,\n$name";
      $sender = "From: <$email>";
      if (mail($receiver, $subject, $body, $sender)) {
        echo "Your message has been sent";
      } else {
        echo "Sorry, failed to send your message!";
      };
    } else {
      echo "Enter a valid email address!";
    };
  } else {
    echo "Email and message field is required!";
  };
} else {
  echo "Error";
};

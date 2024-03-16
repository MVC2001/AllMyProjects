
<?php
session_start();
include("./Config/connection.php");
if ($_SESSION['role']!='Adminstrator') {
    header('Location:index.php');
}

//insert query
    if(isset($_POST["send_text"])){
      $to = $_POST["rec"];
      $subject = $_POST["subject"];
      $message = $_POST["comment"];

     // Additional headers
$headers = "From:" . $senderName . "<" . $senderEmail . ">" . "\r\n" .
        "X-Mailer: PHP/" . phpversion();


    $insert_sms="INSERT INTO comment_tbl (subject,role,comment)
      VALUES('$subject','$to','$comment');";

  if(mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully!";
}
else {
    echo "Failed to send email";
}
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sms PANNEL</title>
   
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Send test</title>
   
     <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

   
  </head>
  <body style="background-color: #aeb6bf ">


<section class="pb-20 relative block bg-blueGray-800">
        <div class="container mx-auto px-4 lg:pt-24 lg:pb-64">
          <div class="flex flex-wrap text-center justify-center">
            <div class="w-full lg:w-6/12 px-4">
             <a href="MessagesPannel.php"><h2 style="font-weight:bold;color:teal">Back Home</h2></a>
            </div>
          </div>
         
          
      </section>
      <section class="relative block pt-24 lg:pt-0 bg-blueGray-800">
        <div class="container mx-auto px-4">
          <div class="flex flex-wrap justify-center lg:-mt-64 -mt-48">
            <div class="w-full lg:w-6/12 px-4">
              <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200">
                <div class="flex-auto p-5 lg:p-10">
                  <h4 class="text-2xl font-semibold">Send message form</h4>
                  <p class="leading-relaxed mt-1 mb-4 text-blueGray-500">
                   Please type your message you wish to send to your members
                  </p> status2


                  <form action="" method="POST">
                  <div class="relative w-full mb-3 mt-8">
                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="subject">Subject</label>
                    <input type="text" name="subject" required class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Subject">
                  </div>

                  
                  <div class="relative w-full mb-3 mt-8">
                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="subject">Subject</label>
                    <input type="text" name="rec" required class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Subject">
                  </div>

                  <div class="relative w-full mb-3">
                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="message">Message</label>
                    <textarea type="text" name="comment" rows="4" cols="80" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Type a message..."></textarea>
                  </div>
                  <div class="text-center mt-6">
                    <button type="submit" name="send_text" class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                      Send Message
                    </button>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

  </body>
  </html>
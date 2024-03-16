<?php
session_start();
include("./Config/connection.php");
include("./Config/connection.php");
if ($_SESSION['role']!='HQAdmin') {
    header('Location:index.php');
  }
//insert query
    if(isset($_POST["send_text"])){
    $subject=$_POST["subject"];
     $role=$_POST["role"];
     $comment =$_POST["comment"];


    $insert_sms="INSERT INTO comment_tbl (subject,role,comment)
      VALUES('$subject','$role','$comment');";

  if (mysqli_query($conn, $insert_sms)) {

    echo "<div class='bg-indigo-900 text-center py-4 lg:px-4'>
  <div class='p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex' role='alert'>
    <span class='flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3'>New</span>
    <span class='font-semibold mr-2 text-left flex-auto'> Message sent successfull</span>
    <svg class='fill-current opacity-75 h-4 w-4' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'><path d='M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z'/></svg>
  </div>
</div>";
   
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
                  </p> 


                  <form action="" method="POST">
                  <div class="relative w-full mb-3 mt-8">
                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="subject">Subject</label>
                    <input type="text" name="subject" required class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Subject">
                  </div>
                     <div class="relative w-full mb-3 mt-8">
                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="subject">Send to approved</label>
                   <select id="countries" type="text" name="role" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Sect where to send </option>
                     <option value="member"> To Approved members</option>
                          <option value="">Not-Approved members</option>
                               </select>
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
  
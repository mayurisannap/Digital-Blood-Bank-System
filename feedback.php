<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Rate the System</title>
      <link rel="stylesheet" href="css/feedback-style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <div class="container">
         <div class="post">
             <div class="text">
                Thanks for rating us!
            </div>
             <div class="edit">
                Edit Feedback
             </div>
        </div>
        <div class="rate">
        <h4 class="y">Rate The System!</h4>
      </div>
      <br>
        
      <div class="star-widget">
      <input type="radio" name="rate" id="rate-5">
      <label for="rate-5" class="fas fa-star"></label>
      <input type="radio" name="rate" id="rate-4">
      <label for="rate-4" class="fas fa-star"></label>
      <input type="radio" name="rate" id="rate-3">
      <label for="rate-3" class="fas fa-star"></label>
      <input type="radio" name="rate" id="rate-2">
      <label for="rate-2" class="fas fa-star"></label>
      <input type="radio" name="rate" id="rate-1">
      <label for="rate-1" class="fas fa-star"></label>
      
      <form action="#">
      <header></header>
      <div class="textarea">
      <textarea cols="30" placeholder="Describe your experience.."></textarea></div>
      <br />

      <div class="btn">
         <button type="submit">Post</button>
      </div>
     </form>
   </div>
      <script>
         const btn = document.querySelector("button");
         const post = document.querySelector(".post");
         const widget = document.querySelector(".star-widget");
         const rate = document.querySelector(".rate");
         const editBtn = document.querySelector(".edit");
         btn.onclick = ()=>{
           widget.style.display = "none";
           rate.style.display = "none";
           post.style.display = "block";
           editBtn.onclick = ()=>{
             widget.style.display = "block";
             post.style.display = "none";
           }
           return false;
         }
      </script>
   </body>
</html>

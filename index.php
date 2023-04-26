<!DOCTYPE HTML>
<html>
  <head>
    <title>GuestBook</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css?v=2" />
  </head>
  <body>
      <section id="guestbook">
        <div class="container">
          <header>
            <h2>Comments:</h2>
          </header>

          <p>Feel free to leave a message :)</p>

          <form id="gbform" method="post" action="gb.php">
            <div class="row">
              <div><input type="text" name="gbname" placeholder="Name" required ></div>
              <div>
                <textarea name="gbmessage" placeholder="Message" required ></textarea>
              </div>
              <div>
                <input type="submit" value="Post it!" />
                <input type="reset" value="Reset" />
              </div>
            </div>
          </form>
          <h3>Messages:</h3>
        </div>
        
        <div class="gb-container">
           <div class="loader"></div> 
          <?php 
            // -> replaced by JS / fetch() ...
            // readfile("gbentries.txt");
          ?>
        </div>
        <script>
          const gbContainer = document.querySelector(".gb-container");
          const gbForm = document.getElementById("gbform");
          
          function checkTime(i) {
            return (i < 10) ? "0" + i : i;
          }
          let today, h, m, s;
          
          function updateDate() {
            today = new Date();
            h = checkTime(today.getHours());
            m = checkTime(today.getMinutes());
            s = checkTime(today.getSeconds());
          };
          updateDate();
          
          let gbTextFile = "gbentries.txt?v="+h+m+s;
          setTimeout(() => {
            fetch(gbTextFile)
             .then(response => response.text())
             .then((data) => {
              gbContainer.innerHTML = data;
            })
          }, 1500);

          gbform.addEventListener("submit", function(event){
            event.preventDefault();
            var fd = new FormData();            
            fd.append("gbname", document.querySelector("input[name=gbname]").value)
            fd.append("gbmessage", document.querySelector("textarea[name=gbmessage]").value);
            fetch('gb.php', {method: "POST", body: fd})
             .then(function(res) { 
               console.log(res)
               if(res.status === 200) {
                gbContainer.innerHTML = '<div class="loader"></div>';
                gbForm.reset();
                updateDate();
                gbTextFile = "gbentries.txt?v="+h+m+s;
                fetch(gbTextFile)
                 .then(response => response.text())
                 .then((data) => {
                   gbContainer.innerHTML = data;
                 })
               }
             })
             .catch(function(res){ console.log("ERROR: " + res) });
          });
        </script>
      </section>
  </body>
</html>
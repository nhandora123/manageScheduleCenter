<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./public/css/index.css">
  <link rel="stylesheet" href="./public/css/home/navigation.css">
  <link rel="stylesheet" href="./public/css/profile.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>

<body>
  <div class="banner" id="sec" >
    <header>
      <input id="getDate" type="date" name="getDate">

      <input type="button" onclick="p_getDayForSchedule()" value="Choose">

      <a href="./credential/signOut"><input type="button" value="signOut"></input></a>

      <div id="toggle" onclick="navigation()"></div>

      <div class="profile" id="profile" onclick="profile()">
        <img src="./public/image/user/<?php if (gettext($data["user"][6]) == "0") echo "avt2.png";
                else echo $data["user"][1].".png"?>" alt="">

        <div id="infoDetail">
          <div class="permission"><?php 
          //echo gettext($data["user"][6]);
          //print_r($data["user"]); 
          echo ($data["user"][5])?>: </div>
          <div id="profileEmailTeacher"><?php echo $data["user"][4]?></div>
          <div class="fullName">
            <?php
              echo "Full Name: ".($data["user"][4])
            ?>
          </div>
          <div class="permissionDetail"> 
              <?php
              echo "Permission: ".($data["user"][5])
              ?>
          </div>
          <div class="mail">
            <?php
              echo "Emai: ".($data["user"][1])
            ?>
          </div>
          <div class="phoneNumber">
            <?php
              echo "Phone Number: ".($data["user"][3])
            ?>
          </div>
          <div class="image">
          <form name="avatar" action="./home/UploadAvatar" method="POST" enctype="multipart/form-data">
                    Upload Avatar: <input type="file" name="file_upload" size="20"><br>
                    <input class="button"  type="submit" value="Upload" name="ok">UpLoad</input>
          </form>

          </div>
        </div>
      </div>

    </header>

    <div id="dateOfWeek"></div>
  </div>
  <div class="navigation" id="navigation">
      <ul>
        <li><a href="#" data-text="Home">Home</a></li>
        <li><a href="#" data-text="About">About</a></li>
        <li><a href="#" data-text="Services">Services</a></li>
        <li><a href="#" data-text="Work">Work</a></li>
        <li><a href="#" data-text="Team">Team</a></li>
        <li><a href="#" data-text="Contact">Contact</a></li>
      </ul>
    </div>
  <?php 
    if(isset($data["user"][5]) && $data["user"][5]==="operator") 
      require_once "./mvc/views/home/formAddClass.php";
  ?>

<?php 
    if(isset($data["user"][5]) && $data["user"][5]==="operator") {
      require_once "./mvc/views/home/formDeleteClass.php";
    }
?>

<?php 
      if(isset($data["user"][5]) && $data["user"][5]==="operator") {
        require_once "./mvc/views/home/formEditClass.php";
      }
?>

<?php require_once "./mvc/views/home/salary.php"?>
  <script src="./public/js/home.js"></script>
  <script src="./public/js/home/navigation.js"></script>
  <script src="./public/js/profile.js"></script>
<script>
  function showSchedule(person) {
    //document.getElementById("containerDistrict").innerText = this.responseText;
    var dateOf = document.getElementById("dateOfWeek");

    dateOf.innerHTML = "";
    Object.keys(person).forEach(key => {
        //document.getElementById("abc").innerText=JSON.stringify(person[key][0]);
        if (person[key][0] != null) {
            var thu = person[key][0].thuTeach;
            var date = person[key][0].dateTeach;
            // if(window.screen.width<850){
            //   thu=thu.substring(0,3);
            //   date =date.substring(5,10)
            // }
            var t_detail = `<div class='box'><div class=title>${thu}<br><span class='dateOf'>${date}</span></div>`;
            i = 0;
            t_detail += "<div class='content'>";
            while (person[key][i] != null) {
                var d = new Date(person[key][i].dateTeach);
                var month = d.getMonth() == 12 ? 1 : d.getMonth() + 1;
                t_detail += `<div class='infor' checking=' ${person[key][i].checking}'> ` +
                    `<img src='https://image.flaticon.com/icons/svg/2245/2245281.svg' alt='ÔI Hổng'> ${person[key][i].idClass} <br>` +
                    `<img src='https://image.flaticon.com/icons/svg/858/858069.svg' alt='ÔI Hổng'>${ person[key][i].nameClass} <br>` +
                    "<span><div><img src='https://image.flaticon.com/icons/svg/1479/1479651.svg' alt='ÔI Hổng'>" + person[key][i].timeStartTeach.substring(0, 5) + "</div>" +
                    "<div><img src='https://image.flaticon.com/icons/svg/1076/1076323.svg' alt='ÔI Hổng'>" + person[key][i].address + "</div></span>" +
                    "<span><div> <img src='https://image.flaticon.com/icons/svg/2302/2302834.svg' alt='ÔI Hổng'>" + person[key][i].numberStudent + "</div>" +
                    "<div><img src='https://image.flaticon.com/icons/svg/656/656264.svg' alt='ÔI Hổng'>" + d.getDate() + "/" + month + "</div></span>" +
                    <?php     
                      if(isset($data["user"][5]) && $data["user"][5]==="operator") {
                    ?>
                    "<div class='justify'>" +
                    `<input id='delete${date}_${i+1}' type='button' value='delete' data-toggle='modal' data-target='#deleteClass' onclick='deleteButtonClass(this, ${JSON.stringify(person[key][i])})'>` +
                    `<input id='edit${date}_${i+1}' type='button' value='edit' data-toggle='modal' data-target='#editClass' onclick='editButtonClass(this, ${JSON.stringify(person[key][i])})'>` +
                    "</div>" +
                    <?php
                      }
                    ?>
                    `<div class='checking'>` +
                    `<input id='checking${date}_${i+1}' type='button' value='checking' onclick='checking(this, ${JSON.stringify(person[key][i])})'>` +
                    <?php     
                      if(isset($data["user"][5]) && $data["user"][5]==="operator") {
                    ?>
                    `<input id='cancel${date}_${i+1}' type='button' value='cancel' onclick='cancel(this, ${JSON.stringify(person[key][i])})'>` +
                    <?php
                      }
                    ?>
                    "</div>" +
                    "</div>"
                i++;
            }
            t_detail += "</div></div>";
            dateOf.innerHTML += t_detail;
            format();
        }
    })
}

</script>
</body>

</html>
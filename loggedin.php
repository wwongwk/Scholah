<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<html>
  <head>
    <title>Scholah!</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style> /*pop up menu*/
      body {
        font-family: "Lato", sans-serif;
      }
      .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
      }
      .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
      }
      .sidenav a:hover {
        color: #f1f1f1;
      }
      .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
      }
      #main {
        transition: margin-left .5s;
        padding: 16px;
      }
      @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
      }
    </style>
    <style> /*pop up log in*/
        body {font-family: Arial, Helvetica, sans-serif;}
        
        /* Full-width input fields */
        input[type=text], input[type=password] {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          box-sizing: border-box;
        }
        
        /* Set a style for all buttons */
        button {
          background-color: #4CAF50;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          cursor: pointer;
          width: 100%;
        }
        
        button:hover {
          opacity: 0.8;
        }
        
        /* Extra styles for the cancel button */
        .cancelbtn {
          width: auto;
          padding: 10px 18px;
          background-color: #f44336;
        }
        
        /* Center the image and position the close button */
        .imgcontainer {
          text-align: center;
          margin: 24px 0 12px 0;
          position: relative;
        }
        
        img.avatar {
          width: 40%;
          border-radius: 50%;
        }
        
        .container {
          padding: 16px;
        }
        
        span.psw {
          float: right;
          padding-top: 16px;
        }
        
        /* The Modal (background) */
        .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
          padding-top: 60px;
        }
        
        /* Modal Content/Box */
        .modal-content {
          background-color: #fefefe;
          margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
          border: 1px solid #888;
          width: 80%; /* Could be more or less, depending on screen size */
        }
        
        /* The Close Button (x) */
        .close {
          position: absolute;
          right: 25px;
          top: 0;
          color: #000;
          font-size: 35px;
          font-weight: bold;
        }
        
        .close:hover,
        .close:focus {
          color: red;
          cursor: pointer;
        }
        
        /* Add Zoom Animation */
        .animate {
          -webkit-animation: animatezoom 0.6s;
          animation: animatezoom 0.6s
        }
        
        @-webkit-keyframes animatezoom {
          from {-webkit-transform: scale(0)} 
          to {-webkit-transform: scale(1)}
        }
          
        @keyframes animatezoom {
          from {transform: scale(0)} 
          to {transform: scale(1)}
        }
        
        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
          span.psw {
             display: block;
             float: none;
          }
          .cancelbtn {
             width: 100%;
          }
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700"
      rel="stylesheet"/>
    <link href="css/main.css" rel="stylesheet" />
    <style>
      #myTable tr td:nth-child(5), #myTable th:nth-child(5), #myTable tr td:nth-child(6), #myTable th:nth-child(6),
      #myTable tr td:nth-child(7), #myTable th:nth-child(7), #myTable tr td:nth-child(8), #myTable th:nth-child(8),
      #myTable tr td:nth-child(9), #myTable th:nth-child(9), #myTable tr td:nth-child(10), #myTable th:nth-child(10),
      #myTable tr td:nth-child(11), #myTable th:nth-child(11), #myTable tr td:nth-child(12), #myTable th:nth-child(12),
      #myTable tr td:nth-child(13), #myTable th:nth-child(13), #myTable tr td:nth-child(14), #myTable th:nth-child(14),
      #myTable tr td:nth-child(15), #myTable th:nth-child(15) {
        display: none;
      }
      div.input-select {
        width:800px;
        /* margin: auto; */
        border: 3px solid #73AD21;
      }
      .slidecontainer {
        width:800px;
        /* margin: auto; */
        /* border: 3px solid #73AD21; */
      }
      .slider {
        -webkit-appearance: none;
        width: 100%;
        height: 10px;
        border-radius: 5px;
        background: #d3d3d3;
        outline: none;
        opacity: 0.9;
        -webkit-transition: 0.2s;
        transition: opacity 0.2s;
      }
      .slider:hover {
        opacity: 1;
      }
      .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #4caf50;
        cursor: pointer;
      }
      .slider::-moz-range-thumb {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #4caf50;
        cursor: pointer;
      }
      .button {
        border-radius: 12px;
        background-color: #4caf50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
      }
    </style>
    <style>
      .rivets:before, .rivets:after, .seal, .type {
        -moz-border-radius: 100%;
        -webkit-border-radius: 100%;
        border-radius: 100%;
      }
      .seal, .seal:before, .type {
        position: absolute;
        top: 50%;
        left: 50%;
      }
      .logo {
        background: #000;
        -moz-border-radius: 1.5em;
        -webkit-border-radius: 1.5em;
        border-radius: 1.5em;
        color: #fff;
        margin: 2em auto;
        position: relative;
        width: 7em;
        height: 7em;
        z-index: -2;
      }
      .logo:before {
        background: #000;
        -moz-border-radius: 1.5em;
        -webkit-border-radius: 1.5em;
        border-radius: 1.5em;
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        -moz-transform: rotate(30deg);
        -ms-transform: rotate(30deg);
        -webkit-transform: rotate(30deg);
        transform: rotate(30deg);
        width: 7em;
        height: 7em;
        z-index: -2;
      }
      .logo:after {
        background: #000;
        -moz-border-radius: 1.5em;
        -webkit-border-radius: 1.5em;
        border-radius: 1.5em;
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        -moz-transform: rotate(-30deg);
        -ms-transform: rotate(-30deg);
        -webkit-transform: rotate(-30deg);
        transform: rotate(-30deg);
        width: 7em;
        height: 7em;
        z-index: -2;
      }
      .rivets {
        width: 7em;
        height: 7em;
      }
      .rivets:before, .rivets:after {
        content: " ";
        background: #000;
        position: absolute;
        top: 50%;
        margin-top: -.25em;
        width: .5em;
        height: .5em;
      }
      .rivets:before {
        left: -.75em;
      }
      .rivets:after {
        right: -.75em;
      }
      .seal {
        background: #000;
        margin-top: -3.5em;
        margin-left: -3.5em;
        width: 7em;
        height: 7em;
      }
      .seal:before {
        background: #0097c0 url("http://stash.rachelnabors.com/codepen/badge/brillant_trans.png") 50% 50%;
        content: '';
        margin-top: -1.25em;
        margin-left: -5.25em;
        z-index: -1;
        width: 10.5em;
        height: 0;
        border: 1.25em solid transparent;
        border-left: 0.625em solid #fff;
        border-right: 0.625em solid #fff;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        /*Fix to make the borders appear on the ribbon ends also*/
        background-origin: border-box;
      }
      .type {
        -moz-transform-origin: 50% 50%;
        -ms-transform-origin: 50% 50%;
        -webkit-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
        -moz-transform: rotate(-30deg);
        -ms-transform: rotate(-30deg);
        -webkit-transform: rotate(-30deg);
        transform: rotate(-30deg);
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        background: #0097c0 url("http://stash.rachelnabors.com/codepen/badge/brillant_trans.png") 50% 50%;
        font-family: "Lato", sans-serif;
        text-align: center;
        text-transform: uppercase;
        padding-top: 1em;
        margin-top: -3em;
        margin-left: -3em;
        width: 6em;
        height: 6em;
      }
      .type h1 {
        font-size: 1.1em;
        font-weight: 900;
      }
      .type em {
        display: block;
        font-size: .75em;
        font-style: italic;
        font-weight: 300;
      }
      table {
        border-collapse: collapse;
        width: 100%;
      }
      th, td {
        text-align: left;
        padding: 8px;
      }
      tr:nth-child(even){background-color: #f2f2f2}
      th {
        background-color: #4CAF50;
        color: white;
      }
    </style>
    
  </head>
  <body>
      <div id="mySidenav" class="sidenav">
          <h4 style="color:white">Welcome <strong><?php echo $_SESSION['username']; ?></strong>,</h4>
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <a href="loggedin.php" class="nav-link">Home</a>
          <a href="index.html" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Log out</a>
        </div>
        
         
        <div id="main">
          <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        </div>
      <div class="logo">
          <div class="rivets">
            <div class="seal">
              <div class="type">
                <h1>Scholah!</h1>
                <em>since 2019</em>
              </div>
            </div>    
          </div>
        </div>  
    <div class="s007">
      <form>
        <div class="inner-form">
          <div class="basic-search">
            <div class="input-field">
              <div class="icon-wrap">
                <svg
                  version="1.1"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                  width="20"
                  height="20"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M18.869 19.162l-5.943-6.484c1.339-1.401 2.075-3.233 2.075-5.178 0-2.003-0.78-3.887-2.197-5.303s-3.3-2.197-5.303-2.197-3.887 0.78-5.303 2.197-2.197 3.3-2.197 5.303 0.78 3.887 2.197 5.303 3.3 2.197 5.303 2.197c1.726 0 3.362-0.579 4.688-1.645l5.943 6.483c0.099 0.108 0.233 0.162 0.369 0.162 0.121 0 0.242-0.043 0.338-0.131 0.204-0.187 0.217-0.503 0.031-0.706zM1 7.5c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5-2.916 6.5-6.5 6.5-6.5-2.916-6.5-6.5z"
                  ></path>
                </svg>
              </div>
              <input type="text" id="myInput" placeholder="Search..." title="Type in a name">
              <div class="result-count"><span>254 </span>results</div>
            </div>
          </div>
          <div class="search-scholarship">
            <div class="container">
              <div class="row">
                <form
                  class="form-inline"
                  role="form"
                  method="POST"
                  action="ops_result_rebrand.php">
                  <input
                    type="hidden"
                    name="isnewsearchresult"
                    id="isnewsearchresult"
                    value="1/"
                  />
  
                  <br/>
                  <div class="input-field">
                    <div class="input-select">
                      <select
                        name="education"
                        id="education"
                        onchange="filterAll()"
                        class="form-control"
                        >&gt;
                        <option value="" placeholder="">EDUCATION LEVEL</option>
                        <option value="1">University student</option>
                        <option value="2">Junior College student</option>
                        <option value="3">Polytechnic student</option>
                        <option value="4">'O' Level graduate</option>
                        <option value="5">ITE student</option>
                        <option value="6">Master's student</option>
                      </select>
                    </div>
                  </div>
                  <br/>
                  <div class="input-field">
                    <div class="input-select">
                      <select
                        name="type"
                        id="type"
                        onchange="filterAll()"
                        class="form-control"
                        >&gt;
                        <option value="" placeholder="">SCHOLARSHIP TYPE</option>
                        <option value="1">Local</option>
                        <option value="2">Overseas</option>
                      </select>
                    </div>
                  </div>
                  <br/>
                  <div class="input-field">
                    <div class="input-select">
                      <select
                        name="nationality"
                        id="nationality"
                        onchange="filterAll()"
                        class="form-control"
                        >&gt;
                        <option value="" placeholder="">NATIONALITY</option>
                        <option value="1">Singaporean</option>
                        <option value="2">Singaporean PR</option>
                        <option value="3">Foreigner</option>
                      </select>
                    </div>
                  </div>
                <br/>
                <div class="slidecontainer">
                    <input type="range" min="0" max="6" value="0" class="slider" id="myRange">
                    <p>Bond Length: <span id="bondlength"></span> years</p>
                  </div>
                </form>
              </div>
            </div>
          </div>  
              <div class="input-field">
                  <div class="table-responsive">
                    <button class="button" type="button" name="load_data" id="load_data" class="btn btn-info">Show All Results</button>
                   <br />
                   <div id="myTable">
                   </div>
                  </div>
                 </div>
            </div>
          </div>
      </form>
      <div id="myTable">
        </div>
    </div>


    <script>
      function filterAll() {
        $('#myTable tr').show();
        try {
            myNationality();
        }
        catch(err) {
            try {
                scholarshipType();
            }
            catch(err) {
                educationLevel();
            } 
        }   
      
      $(document).ready(function () {
        $('#nationality, #type, #education').on("change", filterAll);
      });
      function myNationality() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("nationality");
        filter = input.value; //dropdown selection  
        if (filter == 1) {
          j = 6;
        } else if (filter == 2) {
          j = 7;
        } else if (filter == 3) { 
          j = 8;
        }
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 1; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[j]; //td is T or F
          if (td.textContent == "F") {
            tr[i].style.display = "none";
          }
        }
      }
        function scholarshipType() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("type");
        filter = input.value; //dropdown selection
        if (filter == 1) {
          j = 4;
        } else if (filter == 2) { 
          j = 5;
        }
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 1; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[j]; //td is T or F
          if (td.textContent == "F") {
            tr[i].style.display = "none";
          }
        }
      }
        function educationLevel() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("education");
        filter = input.value; //dropdown selection
        if (filter == 1) {
          j = 12;
        } else if (filter == 2) {
          j = 10;
        } else if (filter == 3) {
          j = 11;
        } else if (filter == 4) {
          j = 9;
        } else if (filter == 5) {
          j = 14;
        } else if (filter == 6) { //masters
          j = 13;
        }
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 1; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[j]; //td is T or F
          if (td.textContent == "F") {
            tr[i].style.display = "none";
          }
        }
      }
    }
    </script>
    <script>
        //search bar filter
      $(document).ready(function(){
        $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
    </script>
    <script>
        $(document).ready(function(){
          $.ajax({
           url:"employee.csv",
           dataType:"text",
           success:function(data) {
            var employee_data = data.split(/\r?\n|\r/);
            var table_data = '<table class="table table-bordered table-striped">';
            for(var count = 0; count<employee_data.length; count++)
            {
             var cell_data = employee_data[count].split(",");
             table_data += '<tr>';
             for(var cell_count=0; cell_count<cell_data.length; cell_count++) {
              if(count === 0) {
               table_data += '<th>'+cell_data[cell_count]+'</th>';
              }
              else {
               table_data += '<td>'+cell_data[cell_count]+'</td>';
              }
             }
             table_data += '</tr>';
            }
            table_data += '</table>';
            $('#myTable').html(table_data);
           }
         });
        });
        
        $(document).ready(function(){
         $('#load_data').click(function(){
          $.ajax({
           url:"employee.csv",
           dataType:"text",
           success:function(data) {
            var employee_data = data.split(/\r?\n|\r/);
            var table_data = '<table class="table table-bordered table-striped">';
            for(var count = 0; count<employee_data.length; count++)
            {
             var cell_data = employee_data[count].split(",");
             table_data += '<tr>';
             for(var cell_count=0; cell_count<cell_data.length; cell_count++)
             {
              if(count === 0)
              {
               table_data += '<th>'+cell_data[cell_count]+'</th>';
              }
              else
              {
               table_data += '<td>'+cell_data[cell_count]+'</td>';
              }
             }
             table_data += '</tr>';
            }
            table_data += '</table>';
            $('#myTable').html(table_data);
           }
          });
         });
        });
    </script>
    <script src="js/extension/choices.js"></script>
    <script>
      const customSelects = document.querySelectorAll("select");
      const deleteBtn = document.getElementById("delete");
      const choices = new Choices("select", {
        searchEnabled: false,
        removeItemButton: true,
        itemSelectText: ""
      });
      for (let i = 0; i < customSelects.length; i++) {
        customSelects[i].addEventListener(
          "addItem",
          function(event) {
            if (event.detail.value) {
              let parent = this.parentNode.parentNode;
              parent.classList.add("valid");
              parent.classList.remove("invalid");
            } else {
              let parent = this.parentNode.parentNode;
              parent.classList.add("invalid");
              parent.classList.remove("valid");
            }
          },
          false
        );
      }
      deleteBtn.addEventListener("click", function(e) {
        e.preventDefault();
        const deleteAll = document.querySelectorAll(".choices__button");
        for (let i = 0; i < deleteAll.length; i++) {
          deleteAll[i].click();
        }
      });
    </script>
    <script> //show bond length
      var slider = document.getElementById("myRange");
      var output = document.getElementById("bondlength");
      output.innerHTML = slider.value;
      slider.oninput = function() {
        output.innerHTML = this.value;
      }
    </script>
    <script> //open menu bar
        function openNav() {
          document.getElementById("mySidenav").style.width = "250px";
          document.getElementById("main").style.marginLeft = "250px";
        }
        
        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
          document.getElementById("main").style.marginLeft= "0";
        }
    </script>
    <script> //pop up log in 
        // Get the modal
        var modal = document.getElementById('id01');
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <script> //pop up sign up
      // Get the modal
      var modal = document.getElementById('id02');
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
      </script>
  </body>
</html>

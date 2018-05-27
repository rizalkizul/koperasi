<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="assets/css/style.css" type="text/css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
 	<script src="assets/js/calendar.js"></script>
</head>
<body class="home" onload="startTime();">
	<?php
		include 'headerAdmin.php';
		include 'logoutAdmin.php';
	?>
	<button id="btnListAnggota" type="submit"><a href="listAnggotaAdmin.php"><img src="assets/img/listAnggota.png"></a><br>List<br>Anggota</button>

	<button id="btnTabelKeuangan" type="submit"><a href="tabelKeuanganAdmin.php"><img src="assets/img/tabelKeuangan.png"></a><br>Tabel<br>Keuangan</button>

	<div class="containerCal">
    <div class="card">
      <div class="front">
        <div class="contentfront">
          <div class="month">
            <table>
              <tr class="orangeTr">
                <th>S</th>
                <th>S</th>
                <th>R</th>
                <th>K</th>
                <th>J</th>
                <th>S</th>
                <th style="color: red;">M</th>
              </tr>
              <tr class="whiteTr">
                <th></th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
              </tr>
              <tr class="whiteTr">
                <th>7</th>
                <th>8</th>
                <th>9</th>
                <th>10</th>
                <th>11</th>
                <th>12</th>
                <th>13</th>
              </tr>
              <tr class="whiteTr">
                <th>14</th>
                <th>15</th>
                <th>16</th>
                <th>17</th>
                <th>18</th>
                <th>19</th>
                <th>20</th>
              </tr>
              <tr class="whiteTr">
                <th>21</th>
                <th>22</th>
                <th>23</th>
                <th>24</th>
                <th>25</th>
                <th>26</th>
                <th>27</th>
              </tr>
              <tr class="whiteTr">
                <th>28</th>
                <th>29</th>
                <th>30</th>
                <th>31</th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </table>
          </div>
          <div class="date">
            <div class="datecont">
              <div id="date"></div>
              <div id="day"></div>
              <div id="month"></div>
              <i class="fa fa-pencil edit" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="back">
        <!-- <div class="contentback">
          <div class="backcontainer">
            hhh
          </div>
        </div> -->
      </div>
    </div>
  </div>

</body></html>
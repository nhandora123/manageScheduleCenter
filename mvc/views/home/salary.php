
<?php
    if(isset($data["user"][5]) && $data["user"][5]==="teacher") {
?>
  <div id="salary">
    <div class="nowSalary salary">
      <h5>Salary Now</h5>
      <div class="money"><span id="nowSalary"></span><span> VND</span></div>
    </div>
    <div class="intendedSalary salary" onclick="getMonthForSchedule()">
      <h5>Intended Salary</h5>
      <div class="money"><span id="intendedSalary"></span><span> VND</span></div>
    </div>
    <div class="taxSalary">
      <h5>Tax's Salary</h5>
      <div class="money"><span id="taxSalary"></span><span> VND</span></div>
      <div class="money"><span id="taxExtSalary"></span><span> VND</span></div>
    </div>
    <i class="fa fa-ellipsis-v" aria-hidden="true" onclick="showDetail()"></i>
    <div id="line"><div id="persent"></div><div id="nowLine"></div></div>
  </div>
<?php
    }
?>
  <div id="moreDetailSalary0" >
    <h1>Detail Salary</h1>
    <div id="toggle" onclick="showDetail()"></div>
    <div class="containerDistrict">
      <div class="district">
        <h1>District</h1>
        <div class="content">
          <div class="detailClass">
            <div class="nameClass">Name Class</div>
            <div class="numberStudent">Student</div>
            <div class="numberDateTeach">Date</div>
            <div class="salaryClass">Salary Class</div>
          </div>
        </div>
        <h2>Summary</h2>
      </div>
      <div id="containerDistrict"></div>
    </div>
  </div>

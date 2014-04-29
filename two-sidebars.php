<?php
/*
Template Name: Two Sidebars
*/
?>
<?php get_header(); ?>

      <div class="container container-breadcrumb">
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li class="active">Trustees</li>
        </ol>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-sm-3 col-md-2 col-lg-2">
            <div class="navbar my-sub-navbar" role="navigation">
              <div class="sub-navbar-header">
                <button type="button" class="navbar-toggle toggle-subnav" data-toggle="collapse" data-target=".sub-navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              
              <span class="navbar-brand">Subnav</span>
              </div>
              <div class="collapse navbar-collapse sub-navbar-collapse">
                <div class="sub-menu-heading">
                  <span>Trustees</span>
                </div>
                <div class="sub-menu-items">
                  <ul>
                    <li><a href="#">Board Meetings</a></li>
                    <li><a href="#">Trunstee Contact Informationi</a></li>
                    <li><a href="#">Student Trustees</a></li>
                    <li><a href="#">Committee Structure</a></li>
                    <li><a href="#">Travel, Meals, and Hospitality Expenses</a></li>
                    <li><a href="#">Trustee Professional Development</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-7 col-lg-8">
            <h1>Two Sidebars</h1>

            <p>The Board’s eleven-person elected board of trustees is responsible for approving the policies and bylaws governing the Board’s operations. The board of trustees also ensures that the quality of education in Waterloo Region is maintained, and the educational goals and needs of all students are met.
            </p>

            <p>It is the responsibility of trustees to attend Committee of the Whole and Board meetings. Committee of the Whole meetings are held on the second and third working Mondays of each month. Board meetings are held on the last working Monday of each month where the Board ratifies the action taken at Committee of the Whole meetings in previous weeks.
            </p>

            <p>The specific list of trustee responsibilities is available here:</p>

            <ul>
              <li>G100 – Governance Policy – Foundations</li>
              <li>G200 – Governance Policy – Roles and Responsibilities</li>
              <li>G201 – Trustee Code of Conduct</li>
              <li>G400 – Board of Trustees Planning Cycle and Evaluations</li>
              <li>G500 – Director of Education Executive Limitations/Requirements</li>
            </ul>
          </div>
          
          <div class="col-sm-3 col-md-3 col-lg-2">
            <div class="list-group">
              <a href="#" class="list-group-item active">
                <h4 class="list-group-item-heading">School Finder</h4>
                <p class="list-group-item-text">Find school near your home</p>
              </a>
              <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">School Calendar</h4>
                <p class="list-group-item-text">Elementary and Secondary School Calendars</p>
              </a>
              <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">School Bus</h4>
                <p class="list-group-item-text">Bus delays and cancel</p>
              </a>
            </div>
          </div>
        </div>
      </div>

<?php get_footer(); ?>

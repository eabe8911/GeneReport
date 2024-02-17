<!--THIS IS THE VIEWPORT AND META OF CUSTOMER CARE / HOME.PHP-->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="LiboBio">
<meta name="author" content="LiboBio">
<!--FAVICON AND TITLE OF WEBSITE-->
<link rel="shortcut icon" href="">
<title>麗寶生醫</title>
<!--DESIGN OR CSS OF HOME.PHP-->
<link href="style/CSS_home.css" rel="stylesheet" type="text/css" />
<link href="style/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="style/icons.css" rel="stylesheet" type="text/css" />

<script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
<script src="assets/plugins/jquery-ui/jquery-ui.js"></script>
<script src="js/jquery.validate.min.js"></script>

<!--link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->

<!-- Include jquery-confirm CSS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<!--THIS JQUERY AND CSS IS FOR JQGRID TABLE TO MAKE IT RESPONSIVE OR BOOTSTRAP-->
<script type="text/ecmascript" src="js/trirand/i18n/grid.locale-tw.js"></script>
<script type="text/ecmascript" src="js/trirand/jquery.jqGrid.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="css/trirand/ui.jqgrid-bootstrap.css" />

<script>
  /**THIS SCRIPT IS FOR JQGRID RESPONSIVE TABLE OR BOOTSTRAP**/
  $.jgrid.defaults.width = 780;
  $.jgrid.defaults.responsive = true;
  $.jgrid.defaults.styleUI = 'Bootstrap';
</script>
<style>
  body {
    /* background: #ebeff2;
    font-family:Microsoft JhengHei, 'Noto Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    /* font-size:12px; */
    /* margin: 0;
    overflow-x: hidden;
    padding-bottom: 65px;
    color: #000000; */
    */
  }

  html {
    /* position: relative;
    min-height: 100%;
    background: #ffffff; */
  }

  .ui-jqgrid .ui-jqgrid-btable tr:nth-child(odd) {
    background-color: #f2f2f2;
    /* Change this value to the desired background color */
  }

  /* Panels */
  .panel {
    border: none;
    margin-bottom: 20px;
  }

  .panel .panel-body {
    padding: 20px;
  }

  .panel .panel-body p {
    margin: 0px;
  }

  .panel .panel-body p+p {
    margin-top: 15px;
  }

  .panel-heading {
    border: none !important;
    padding: 10px 20px;
  }

  .panel-default>.panel-heading {
    background-color: #f4f8fb;
    border-bottom: none;
    color: #000000;
  }

  .panel-color .panel-title {
    color: #ffffff;
  }

  .panel-danger>.panel-heading {
    background-color: #f05050;
  }


  /*  Checkbox and Radios*/
  .checkbox {
    padding-left: 20px;
  }

  .checkbox label {
    display: inline-block;
    padding-left: 5px;
    position: relative;
  }

  .checkbox label::before {
    -o-transition: 0.3s ease-in-out;
    -webkit-transition: 0.3s ease-in-out;
    background-color: #ffffff;
    border-radius: 3px;
    border: 1px solid #cccccc;
    content: "";
    display: inline-block;
    height: 17px;
    left: 0;
    margin-left: -20px;
    position: absolute;
    transition: 0.3s ease-in-out;
    width: 17px;
    outline: none !important;
  }

  .checkbox label::after {
    color: #555555;
    display: inline-block;
    font-size: 11px;
    height: 16px;
    left: 0;
    margin-left: -20px;
    padding-left: 3px;
    padding-top: 1px;
    position: absolute;
    top: 0;
    width: 16px;
  }

  .checkbox input[type="checkbox"] {
    cursor: pointer;
    opacity: 0;
    z-index: 1;
    outline: none !important;
  }

  .checkbox input[type="checkbox"]:disabled+label {
    opacity: 0.65;
  }

  .checkbox input[type="checkbox"]:focus+label::before {
    outline-offset: -2px;
    outline: none;
    outline: thin dotted;
  }

  .checkbox input[type="checkbox"]:checked+label::after {
    content: "\f00c";
    font-family: 'FontAwesome';
  }

  .checkbox input[type="checkbox"]:disabled+label::before {
    background-color: #eeeeee;
    cursor: not-allowed;
  }

  .checkbox-danger input[type="checkbox"]:checked+label::before {
    background-color: #f05050;
    border-color: #f05050;
  }

  .checkbox-danger input[type="checkbox"]:checked+label::after {
    color: #ffffff;
  }

  .checkbox-success input[type="checkbox"]:checked+label::before {
    background-color: #81c868;
    border-color: #81c868;
  }

  .checkbox-success input[type="checkbox"]:checked+label::after {
    color: #ffffff;
  }

  .breadcrumb {
    background-color: transparent;
    margin-bottom: 15px;
    padding-top: 10px;
    padding-left: 0px;
  }

  /* Form components */
  textarea.form-control {
    min-height: 90px;
  }

  .form-control {
    background-color: #FFFFFF;
    border: 1px solid #E3E3E3;
    border-radius: 4px;
    color: #565656;
    padding: 7px 12px;
    height: 38px;
    max-width: 100%;
    -webkit-box-shadow: none;
    box-shadow: none;
    -webkit-transition: all 300ms linear;
    -moz-transition: all 300ms linear;
    -o-transition: all 300ms linear;
    -ms-transition: all 300ms linear;
    transition: all 300ms linear;
  }

  .form-control:focus {
    background-color: #FFFFFF;
    border: 1px solid #AAAAAA;
    -webkit-box-shadow: none;
    box-shadow: none;
    outline: 0 !important;
    color: #333333;
  }

  .form-horizontal .form-group {
    margin-left: -10px;
    margin-right: -10px;
  }

  /*Links文章去除連結底線*/
  .a {
    color: #904E0E;
    text-decoration: none;
  }

</style>
<html>
<head>
    
    <link href="<?= base_url('assets/customer/'); ?>css/bootstrap.css" rel="stylesheet" />
  <style>
    @page { margin: 125px 4px; }
    #header { position: fixed; left: 0px; top: -121px; right: 0px; height: 103px; text-align: center; }
    #footer { position: fixed; left: 0px; bottom: -121px; right: 0px; height: 35px; background-color: gray; }
    #footer .page:after { content: counter(page, upper-roman); }
  </style>
<body>
  <div id="header">
    <h1 style="color: #0033FF; font-family: 'Gabriola'; "> BIOLUX OPTICAL</h1>
    <img src="<?= base_url('assets/img/logo.png'); ?>" alt="logo" >
    <img src="<?= $_SERVER["DOCUMENT_ROOT"].'/bioluxoptical/assets/img/logo.png'; ?>" alt="logo" >
  </div>
  <div id="footer">
    
    <p class="page" style="float: left;margin: 4px"> <?= date('d/m/Y H:i:s', time()) ?></p>
    <p class="page" style="float: right;margin: 4px"> Page </p>
  </div>
  <div id="content">
    <p>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Author</th>
            <th>Act</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Ulrich </td>
            <td>Test</td>
        </tr>
        <tbody>
</table>
    </p>
    <p style="page-break-before: always;">the second page</p>
  </div>
</body>
</html>
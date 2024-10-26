    <html>
    <head>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    <script type="text/javascript">
    $(function()
    {
        function tally (selector) 
        {
          $(selector).each(function () 
          {
              var total = 0,
              column = $(this).siblings(selector).andSelf().index(this);
              $(this).parents().prevUntil(':has(' + selector + ')').each(function () 
              {
                total += parseFloat($('td.sum:eq(' + column + ')', this).html()) || 0;
              })
              $(this).html(total);
         });
        }
      tally('td.subtotal');
      tally('td.total');
    });
    </script>
    </head>
    <body>
    <table border="1" width="500" id="data">
      <tr align="center" bgcolor="#CCCCCC">
        <th>Name</th>
        <th>Age</th>
        <th>Weight</th>
        <th>Number</th>
        <th>&nbsp;</th>
      </tr>
      <tr align="center">
        <td>Joe</td>
        <td class="sum">34</td>
        <td class="sum">-150</td>
        <td class="sum">1</td>
        <td class="sum">&nbsp;</td>
      </tr>
      <tr align="center">
        <td>Jack</td>
        <td class="sum">29</td>
        <td class="sum">100</td>
        <td class="sum">1</td>
        <td class="sum">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5"><hr></td>
      </tr>
      <tr align="center" bgcolor="#00CCFF">
        <th colspan="1" align="right">&nbsp;</th>
        <td class="total"></td>
        <td class="total"></td>
        <td class="total"></td>
        <td class="total"></td>
      </tr>
    </table>
    </body>
    </html>
<?php include 'variables.php'; ?>

<div id="loancalculator">
<div class="inner">
<h3 class='loancalculator'><?php echo get_option('wp_loancalculator_text'); ?></h3>
<form action="POST">
              <table>
			  
			  <colgroup>
				<col class='labels' />
				<col />
			  </colgroup>
			  
                <tr> 
                  <td>Loan Amount <?php echo $currencysymbol ?></td>
                  <td>
                    <input type="text" id="LoanAmount" size="10" name="LoanAmount" value="30000" />
                    </td>
                </tr>
				
                <tr> 
                  <td>Down Payment <?php echo $currencysymbol ?></td>
                  <td>
                    <input type="text" id="DownPayment" size="10" name="DownPayment" value="0" />
                    </td>
                </tr>
				
                <tr> 
                  <td>Annual Rate</td>
                  <td>
                    <input id="InterestRate" type="text" size="3" name="InterestRate" value="7.0" />
                    % <br />
                    </td>
                </tr>
                <tr> 
                  <td>Term</td>
                  <td>
                    <input id="NumberOfYears" type="text" size="3" name="NumberOfYears" value="4" />
                    Yrs<br />
                    </td>
				</tr>
				<tr>
                  <td colspan="2">
                    <input id="morgcal" class="button" type="button" name="morgcal" value="Calculate" />
                    </td>
				</tr>
                
				
                <tr> 
                  <td>Payments</td>
                  <td>
                    <input id="NumberOfPayments" type="text" name="NumberOfPayments" />
                    <br />
                    </td>
                </tr>
                <tr> 
                  <td>Monthly Payment <?php echo $currencysymbol ?></td>
                  <td>
                    <input id="MonthlyPayment" type="text" name="MonthlyPayment" />
                    <br />
                    </td>
                </tr>
              </table>

      </form>
</div>      
</div>


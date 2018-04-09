<?php
/** ******************************************************************
* chkFiscalCode class to check italian VAT Code and Fiscal Code
*
* THIS IS JUST FOR TEST THE CLASS
*
* @copyright  ConsulTes Snc 2003 - info@consultes.it
* @author     Daniele Testoni    - daniele.testoni@consultes.it
* ***************************************************************** */

	// Include the class
	include('./chkFiscalCode_it.php');

	// Codes to check
	$vat_code    = '02591600131';
	$fiscal_code = 'TSTDNL64H19C933P';
	$wrong_code  = 'thisiswrong';
	$wrong_code2 = 'alsothisiswrong';

	// Test codes
	print("<pre><strong>Test italian VAT & Fiscal Codes check</strong>\n");
	test($vat_code);		// VAT Code
	test($fiscal_code);		// Fiscal Code
	test($wrong_code);		// Wrong code
	test($wrong_code2);		// Wrong code
	print("</pre>\n");

	// ------------------------------
	// Function for the test execution
	function test($code) {
		print("\n\n<strong>Test code $code</strong>\n");
		// Create the object
		$code = new chkFiscalCode_it($code);
		// Check
		if ($error = $code->check()) {
			// Wrong code
			print("$error\n");
		} else {
			// Right code
			print("Code type " . $code->type() . "\n"); // Code type
			print("Code details\n");
			print_r($code->explode()); // Code details
			print("\n");
		}
	}

?>
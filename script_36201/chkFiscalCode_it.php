<?php
/** ******************************************************************
* chkFiscalCode class to check italian VAT Code and Fiscal Code
*
* Public methods:
* - type		return code type
* - check		check the code
* - explode		return code detail
*
* @copyright  ConsulTes Snc 2003 - info@consultes.it
* @author     Daniele Testoni    - daniele.testoni@consultes.it
* ***************************************************************** */

class chkFiscalCode_it {

	/** ******************************************************************
	* Private properties
	* ***************************************************************** */

	var $_code;		// string  code 
	var $_type;		// string  code type

	// Code types
	var $_types = array(
		'PI' => 'VAT Code',
		'CF' => 'Fiscal Code'
		);

	// Table for letter to number conversion
	var $_letter_number = array(
		'A' =>  1, 'B' =>  0, 'C' =>  5, 'D' =>  7, 'E' =>  9, 'F' => 13,
		'G' => 15, 'H' => 17, 'I' => 19, 'J' => 21, 'K' =>  2, 'L' =>  4,
		'M' => 18, 'N' => 20, 'O' => 11, 'P' =>  3, 'Q' =>  6, 'R' =>  8,
		'S' => 12, 'T' => 14, 'U' => 16, 'V' => 10, 'W' => 22, 'X' => 25,
		'Y' => 24, 'Z' => 23
		);

	// Table for letter to month
	var $_month = array(
		'A' => array( 1, 'January'),   'B' => array( 2, 'February'),
		'C' => array( 3, 'March'),     'D' => array( 4, 'April'),
		'E' => array( 5, 'May'),       'H' => array( 6, 'June'),
		'L' => array( 7, 'July'),      'M' => array( 8, 'August'),
		'P' => array( 9, 'September'), 'R' => array(10, 'October'),
		'S' => array(11, 'November'),  'T' => array(12, 'December'),
		);

	// Table positions of numbers in Fiscal Code
	var $_number_position = array(6, 7, 9, 10, 12, 13, 14);

	// Table for number to letter for homonyms
	var $_number_letter = array(
		'L' => 0, 'M' => 1, 'N' => 2, 'P' => 3, 'Q' => 4,
		'R' => 5, 'S' => 6, 'T' => 7, 'U' => 8, 'V' => 9
		);

	/** ******************************************************************
	* Constructor
	* @param	$p_code		string  code
	* @param	$p_type		string  code type (see $this->_types)
	* @return	NULL
	* ***************************************************************** */
	function chkFiscalCode_it($p_code, $p_type = '')
	{
		// This is the code
		$this->_code = strtoupper($p_code);

		// If no code type declared try to guess it
		if ($p_type) {
			if ($this->_types[$p_type]) $this->_type = $p_type;
		 } else {
			foreach ($this->_types as $type => $description) {
				$guess = "_guess_$type";
				$t = $this->$guess($type);
				if ($t) $this->_type = $t;
			}
		}
	}

	/** ******************************************************************
	* Return the code type
	* @param	NULL
	* @return			string  code type
	* ***************************************************************** */
	function type()
	{
		return $this->_type;
	}

	/** ******************************************************************
	* Check the code
	* @param	NULL
	* @return			string  error message
	* ***************************************************************** */
	function check()
	{
		if ($type = $this->_type) {
			$check = "_check_$type";
			return $this->$check();
		} else
			return "Code type not recognised";
	}

	/** ******************************************************************
	* Return code details
	* @param	NULL
	* @return			array  code details
	* ***************************************************************** */
	function explode()
	{
		if ($type = $this->_type) {
			$explode = "_explode_$type";
			return $this->$explode();
		} else
			return array();
	}

	/** ******************************************************************
	* Guess if it's a VAT Code
	* @param	$p_type		string  type to guess
	* @return				string	code type
	* ***************************************************************** */
	function _guess_PI($p_type)
	{
		if (strlen($this->_code) == 11) return $p_type;

		return '';
	}

	/** ******************************************************************
	* Check the VAT Code
	* @param	NULL
	* @return			string  error message
	* ***************************************************************** */
	function _check_PI()
	{
		$code = $this->_code;

		// ------------------------------------------------------------
		// Check the length of the code (11 digit)
		// ------------------------------------------------------------
		if (strlen($code) != 11)
			return "The VAT Code $code must be 11 digit long";

		// ------------------------------------------------------------
		// Check the content of the code, only numbers are valid
		// ------------------------------------------------------------
		if (ereg("[^0-9]", $code))
			return "The VAT Code $code must contains only numbers";

		// ------------------------------------------------------------
		// Calculate the sum of odd digits
		// ------------------------------------------------------------
		for ($i = 1; $i < 11; $i = $i + 2) {
			// Sum the digit as is
			// Example: Digit=5 ... sum to odds
			$odds += $code[$i-1];
		}

		// ------------------------------------------------------------
		// Calculate the sum of even digits
		// ------------------------------------------------------------
		for ($i = 2; $i < 11; $i = $i + 2) {
			// Double the digit
			// Example: Digit=8 ... 8*2=16
			$double = $code[$i-1] * 2;
			// Sum both digits of the previous double
			// Example: Number=16 ... 1+6=7
			$double = ($double < 10) ? 'A0' . $double : 'A' . $double;
			$double = $double[1] + $double[2];
			// Add the result to the sum
			// Example: Digit=7 ... sum to 
			$evens += $double;
		}

		// ------------------------------------------------------------
		// Check the check digit (digit 11)
		// ------------------------------------------------------------
		// Totalize odds sum and evens sum
		$total = $odds + $evens;
		// Substract units of the total from 10, the unit result is the check digit
		// Example: 23+45=68 ... 10-8=2 ... check digit is 2
		$char = substr(10 - substr($total, -1), -1);
		// Check
		if ($code[11-1] != $char)
			return "The VAT Code $code is not correct";

		// ------------------------------------------------------------
		// The code is correct
		// ------------------------------------------------------------
		return '';
	}

	/** ******************************************************************
	* Return VAT Code details
	* @param	NULL
	* @return			array  VAT Code details
	* ***************************************************************** */
	function _explode_PI()
	{
		$code = $this->_code;

		// Make details
		$detail = $this->_check_PI();
		if (!$detail) {
			$detail = array(
				'code'     => $code,
				'sequence' => substr($code, 0, 10),
				'check'    => substr($code, 10, 1)
				);
		} else
			$detail = array();

		return $detail;
	}

	/** ******************************************************************
	* Guess if it's a Fiscal Code
	* @param	$p_type		string  type to guess
	* @return				string  code type
	* ***************************************************************** */
	function _guess_CF($p_type)
	{
		if (strlen($this->_code) == 16) return $p_type;

		return '';
	}

	/** ******************************************************************
	* Check the Fiscal Code
	* @param	NULL
	* @return			string  error message
	* ***************************************************************** */
	function _check_CF()
	{
		$code = $this->_code;

		// ------------------------------------------------------------
		// Check the length of the code (16 characters)
		// ------------------------------------------------------------
		if (strlen($code) != 16)
			return "The Fiscal Code $code must be 16 characters long";

		// ------------------------------------------------------------
		// Check the content of the code, only numbers and letters are valid
		// ------------------------------------------------------------
		if (ereg("[^0-9A-Z]", $code))
			return "The Fiscal Code $code must contains only numbers and letters";

		// ------------------------------------------------------------
		// Calculate the sum of odd characters
		// ------------------------------------------------------------
		$number_number = array_values($this->_letter_number);
		for ($i = 1; $i < 16; $i = $i + 2)
			if (ereg("[0-9]", $char = $this->_code[$i - 1])) {
				// Sum a number
				// Example: Character=4 ... letter_number ... sum 9 (E=9)
				$odds += $number_number[$char];
			} else {
				// Sum a letter
				// Example: Character=A ... letter_number ... sum 1 (A=1)
				$odds += $this->_letter_number[$char];
			}

		// ------------------------------------------------------------
		// Calculate the sum of even characters
		// ------------------------------------------------------------
		for ($i = 2; $i < 16; $i = $i + 2)
			if (ereg("[0-9]", $char = $this->_code[$i - 1])) {
				// Sum a number
				// Example: Character=4 ... sum 4
				$evens += $char;
			} else {
				// Sum a letter
				// Example: Character=C ... alphabet ... sum 2 (from 0 to 25)
				$evens += ord($char) - ord('A');
			}

		// ------------------------------------------------------------
		// Check the check digit (character 16)
		// ------------------------------------------------------------
		// Total of odds sum and evens sum
		$sum  = $odds + $evens;
		// Calculate the remainder of the total divided by 26
		// Example: totals 42 and 129
		//   42+129=171 ... 171/26=6,57 ... 6*26=156 ... 171-156=15
		$char = $sum / 26;
		$char = (int) $char * 26;
		$char = $sum - $char;
		// Calculate the check digit (a letter)
		// Example: number_letter ... letter=P (from 0 to 25)
		$number_letter = array_keys($this->_letter_number);
		$char = $number_letter[$char];
		// Check
		if ($code[16-1] != $char)
			return "The Fiscal Code $code is not correct";

		// ------------------------------------------------------------
		// The code is correct
		// ------------------------------------------------------------
		return '';
	}

	/** ******************************************************************
	* Return Fiscal Code details
	* @param	NULL
	* @return			array  Fiscal Code details
	* ***************************************************************** */
	function _explode_CF()
	{
		$code = $this->_code;

		// Substitute the numbers with letters for homonyms
		foreach ($this->_number_position as $k => $position) {
			if ($letter = $this->_number_letter[$code[$position]])
				$code[$position] = $letter;
		}

		// Make details
		if (!$detail) {
			$detail = array(
				'code'    => $code,
				'surname' => substr($code,  0, 3),
				'name'    => substr($code,  3, 3),
				'year'    => substr($code,  6, 2),
				'month'   => substr($code,  8, 1),
				'day'     => substr($code,  9, 2),
				'place'   => substr($code, 11, 4),
				'check'   => substr($code, 15, 1)
			);
			if ($detail['day'] > 40) {
				$detail['sex'] = 'F';	// Female
				$detail['day'] -= 40;
			} else
				$detail['sex'] = 'M';	// Male
			$detail['month'] = $this->_month[$detail['month']];
		} else
			$detail = array();

		return $detail;
	}

}

?>
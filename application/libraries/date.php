<?php
	/**
	 * A class providing date/time services to Bamboo Applications.
	 * @author Boxkite Media
	**/
	class date {

		public static function friendly($dateTime) {
			$now = time();
			$then = strtotime($dateTime);
			$difference = $now - $then;

			$hours 		= round($difference / (60*60), 			0);
			$days		= round($difference / (60*60*24), 		0);
			$weeks		= round($difference / (60*60*24*7), 	0);
			$months 	= round($difference / (60*60*24*31), 	0);
			$years 		= round($difference / (60*60*24*31*12),	0);

			if($difference < 10) {							// < 10 seconds
				return "just now";
			} else if($difference < 60) {					// < 1 minute
				return "less than a minute ago";
			} else if($difference < 60 * 2) {				// < 2 minutes
				return "about 2 minutes ago";
			} else if($difference < 60 * 5) {				// < 5 minutes
				return "about 5 minutes ago";
			} else if($difference < 60 * 10) {				// < 10 minutes
				return "about a minute ago";
			}  else if( $difference < 60 * 30 ) {			// < 30 minutes
				return "about 30 minutes ago";
			} else if( $difference < 60 * 45 ) {			// < 45 minutes
				return "about 45 minutes ago";
			} else if( $difference < 60 * 60 ) {			// < 1 hour
				return "about an hour ago";
			}

			else if($hours < 24) {							// < 1 day
				return "about $hours hours ago";
			}

			else if($days == 1) {							// 1 day
				return "about $days day ago";
			} else if($days < 7) {							// < 7 days
				return "about $days days ago";
			}

			else if($weeks == 1) {							// 1 week
				return "about $weeks week ago";
			} else if ($weeks < 5) {						// < 5 weeks
				return "about $weeks weeks ago";
			}

			else if($months == 1) {							// 1 month
				return "about $months month ago";
			} else if($months < 25) {						// < 13 months
				return "about $months months ago";
			}

			else if($years == 1) {							// 1 year
				return "about $years year ago";
			} else {
				return "about $years years ago";
			}
		}

		/**
		 * Converts a date from one format to another.
		 * @param orig The original date input.
		 * @param time Boolean value indicating whether or not the method should try to parse the time.
		 * @param format The format of the date output, as defined by PHP's <a href="http://us3.php.net/function.date">date()</a> format.
		 * @return The date formatted as desired.
		**/
		public static function convertDate($orig, $format="m/d/Y h:i:s A") {
			if($orig == null || $orig == "0000-00-00" || $orig == "0000-00-00 00:00:00") {
				$result = new DateTime();
			} else {
				$result = new DateTime($orig);
			}

			$result = $result->format($format);

			return $result;
		}

		/**
		 * Reformats a timestamp string from HHMMSS format to HH:MM AM/PM format.
		 * @param The coded time.
		 * @return The formatted time.
		**/
		public static function convertTime($orig) {
			$result = "";

			$hour = substr($orig, 0, 2);
			$minute = substr($orig, 3, 2);
			// $second = substr($orig, 0, 2);

			if($hour > 12) {
				$ampm = "PM";
				$hour -= 12;
			}
			elseif($hour == 12) {
				$ampm = "PM";
			}
			elseif($hour == 0) {
				$ampm = "AM";
				$hour = 12;
			}
			else {
				$ampm = "AM";
			}

			$result = "$hour:$minute $ampm";

			return $result;
		}

		/**
		 * A static function to generate the HTML code for a date selector.
		 * @param name The root name of the select boxes. The boxes become named $name_month, $name_date, etc.
		 * @param sel Have a date selected when the HTML loads. Set to 0 by default (no default date).
		**/
		public static function dateSelect($name="", $sel=0) {
			if($sel != 0) {
				$year = substr($sel, 0, 4);
				$month = substr($sel, 5, 2);
				$day = substr($sel, 8, 2);
			}
			else {
				$year = -1;
				$day = -1;
				$month = -1;
			}

			$result = "<select name=".$name."_month id=".$name."_month>";

			//> month
			for($i = 1; $i <= 12; $i++) {
				if($i < 10)
					$i = "0" . $i;

				$result .=  "<option value=".$i." ";
				if($month == -1) {
					if($i == date("n"))
						$result .= "selected";
				}
				else {
					if($month == $i)
						$result .= "selected";
				}
				$result .= ">".date("F", mktime(0,0,0,$i,1,2000))."</option>";
			}
			$result .= "</select> / ";

			//> day
			$result .= "<select name=".$name."_day>";
			for($i = 1; $i <= 31; $i++) {
				if($i < 10)
					$i = "0" . $i;

				$result .=  "<option value=".$i." ";
				if($day == -1) {
					if($i == date("j"))
						$result .= "selected";
				}
				else {
					if($day == $i)
						$result .= "selected";
				}
				$result .= ">".$i."</option>";
			}
			$result .= "</select> / ";

			//> year
			$result .= "<select name=".$name."_year>";
			for($i = date("Y")-10; $i <= date("Y") + 10; $i++) {
				$result .=  "<option value=".$i." ";
				if($year == -1) {
					if($i == date("Y"))
						$result .= "selected";
				}
				else {
					if($year == $i)
						$result .= "selected";
				}
				$result .= ">".$i."</option>";
			}
			$result .= "</select>";

			return $result;
		}

		/**
		 * Static function to generate the HTML time select code.
		 * @param name The prefix for all the select box field names.
		 * @param sel The presently selected value represented as HHMM
		**/
		public static function timeSelect($name, $sel=null) {
			if($sel != null) {
				$hour = substr($sel, 0, 2);
				$minute = substr($sel, 3, 2);

				if($hour > 12) {
					$hour -= 12;
					$ampm = "pm";
				}
				elseif($hour == 0) {
					$hour = 12;
					$ampm = "am";
				}
				elseif($hour < 12) {
					$hour = $hour;
					$ampm = "am";
				}
				else {
					$hour = 12;
					$ampm = "pm";
				}
			}
			else {
				$hour = date("g");
				$minute = date("i");
				$ampm = date("a");
			}

			$result = "
				<select name='".$name."_hour'>
			";

					for($i = 1; $i <= 12; $i++) {
						if($i < 10)
							$i = "0" . $i;
						$result .= "
							<option value=$i ".($hour==$i ? "selected" : "").">$i</option>
						";
					}

			$result .= "
				</select>:

				<select name='".$name."_minute'>
			";
					for($i = 0; $i <= 59; $i+=1) {
						if($i < 10)
							$i = "0" . $i;
						$result .= "
							<option value=$i ".($minute==$i ? "selected" : "").">$i</option>
						";
					}

			$result .= "
				</select>

				<select name='".$name."_ampm'>
					<option value=am ".($ampm=="am" ? "selected" : "").">AM</option>
					<option value=pm ".($ampm=="pm" ? "selected" : "").">PM</option>
				</select>
			";

			return $result;
		}

		/**
		 * Takes the date from a series of Date month/day/year select boxes and formats it for SQL.
		 *
		 * The method pulls $rName_year, $rName_month, and $rName_day from the form to generate the
		 * timestamp string.
		 * @param rName The prefix of the date fields.
		 * @return The formatted date.
		**/
		public static function restoreDate($rName) {
			return $_REQUEST[$rName . "_year"] . "-" . $_REQUEST[$rName . "_month"] . "-" . $_REQUEST[$rName . "_day"];
		}

		/**
		 * Takes the time from a series of Time hour/minute/ampm select boxes and formats it for SQL.
		 *
		 * The method pulls $rName_hour, $rName_minute, $rName_ampm from the form and generates
		 * the time string for storage.
		 * @param rName The prefix string of the time fields.
		 * @return The formatted time.
		**/
		public static function restoreTime($rName) {
			$hour = $_REQUEST[$rName . '_hour'];
			$minute = $_REQUEST[$rName . '_minute'];
			$ampm = $_REQUEST[$rName . '_ampm'];
			if($ampm == "am") {
				if($hour == 12) $hour = "00";
			}
			if($ampm == "pm") {
				if($hour != 12) $hour += 12;
			}

			return "$hour:$minute:00";
		}

	}

?>
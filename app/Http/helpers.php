<?php  

	
/*
|--------------------------------------------------------------------------
| sendResponse
| $data, $status_code
|--------------------------------------------------------------------------
*/
function sendResponse($data, $status_code)
{
	$response_data = [
		'data' => $data,
		'message' => statusCodeMessage($status_code),
		'status' => $status_code
	];

	return response()->json($response_data, $status_code);
}

function statusCodeMessage($status_code)
{
	$addtional_error_message = " | 😡😡 abeg go documentation 📓📓 go fix your issue nah, and make you day open your eyes 👀 next time 🙄🙄🙄🙄:)";
	$addtional_success_message = " | 🔥🔥👊👊 Naso, everything green here dude or dude-es lol, any which one you are 🤘🤘👌👌💻👨💻";
	switch ($status_code) {
	    
	    case 200:
	        return "OK" . $addtional_success_message;
	        break;
	    
	    ###4×× Client Error 

	    case 400:
	        return "Bad Request" . $addtional_error_message;
	        break;
	    case 404:
	        return "Not Found" . $addtional_error_message;
	        break;
	}
}
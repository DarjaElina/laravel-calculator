<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller {
  public function index() {
    return view('calculator');
  }

  public function calculate(Request $request) {
    $request->validate([
      'number1' => 'required|numeric',
      'number2' => 'required|numeric',
      'operation' => 'required|in:addition,subtraction,multiplication,division'
    ]);

    $number1 = $request->input('number1');
    $number2 = $request->input('number2');
    $operation = $request->input('operation');

    $result = '';
    $errorMessage = '';

    if ($operation === 'addition') {
      $result = $number1 + $number2;
    }
    elseif ($operation === 'subtraction') {
      $result = $number1 - $number2;
    }
    elseif ($operation === 'multiplication') {
      $result = $number1 * $number2;
    }
    elseif ($operation === 'division') {
      if ($number2 == 0) {
        $errorMessage = 'Can\'t divide by zero';
      } else {
          $result = $number1 / $number2;
      }
    }

    return view('calculator', [
      'number1' => $number1,
      'number2' => $number2,
      'operation' => $operation,
      'result' => $result,
      'errorMessage' => $errorMessage
    ]);
  }
}
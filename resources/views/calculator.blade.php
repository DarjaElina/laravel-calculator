<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calculator</title>
    <style>
        body {
            background-color: #1e1b2e; /* deep dark violet */
            color: #e0e0e0; /* light gray for contrast */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #c5b4e3; /* soft violet */
            margin-bottom: 1.5rem;
        }

        form {
            background-color: #2c2a3e;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
            width: 100%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        label {
            font-weight: bold;
            margin-bottom: 0.25rem;
            color: #d1cfe4;
        }

        input[type="number"],
        select {
            padding: 0.5rem;
            border-radius: 6px;
            border: none;
            background-color: #423f5c;
            color: #f5f5f5;
        }

        button {
            padding: 0.7rem;
            background-color: #6f42c1;
            border: none;
            border-radius: 6px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #5a32a3;
        }

        .result, .error {
            background-color: #37344e;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 1.5rem;
            width: 100%;
            max-width: 400px;
        }

        .result h3 {
            margin: 0 0 0.5rem 0;
            color: #a78bfa;
        }

        .error {
            color: #ff6b6b;
        }
    </style>
</head>
<body>
    <h1>🧮 Calculator</h1>

    <form action="{{ route('calculator.calculate') }}" method="POST">
        @csrf
        <label for="number1">Enter first number</label>
        <input type="number" name="number1" id="number1" required value="{{ old('number1', $number1 ?? '') }}">

        <label for="number2">Enter second number</label>
        <input type="number" name="number2" id="number2" required value="{{ old('number2', $number2 ?? '') }}">
        
        <label for="operation">Select operation</label>
        <select name="operation" id="operation" required>
            <option value="" disabled selected>Select an operation</option>
            <option value="addition" {{ old('operation', $operation ?? '') === 'addition' ? 'selected' : '' }}>Add</option>
            <option value="subtraction" {{ old('operation', $operation ?? '') === 'subtraction' ? 'selected' : '' }}>Subtract</option>
            <option value="multiplication" {{ old('operation', $operation ?? '') === 'multiplication' ? 'selected' : '' }}>Multiply</option>
            <option value="division" {{ old('operation', $operation ?? '') === 'division' ? 'selected' : '' }}>Divide</option>
        </select>

        <button type="submit">Calculate</button>
    </form>

    @if(isset($result))
    <div class="result">
        <h3>Result:</h3>
        <p>{{ $result }}</p>
    </div>
    @endif

    @if(!empty($errorMessage))
    <div class="error">
        <p>{{ $errorMessage }}</p>
    </div>
    @endif
</body>
</html>


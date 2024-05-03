<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Summary</title>
<style>
  body {
    font-family: Arial, sans-serif;
  }
  .container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
  .summary {
    text-align: center;
    border: 1px solid #ccc;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  .button-container {
    margin-top: 20px;
  }
  .button {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  .button:hover {
    background-color: #0056b3;
  }
</style>
</head>
<body>

<div class="container">
  <div class="summary">
    <h2>Data Summary</h2>
    <p><strong>Count of records:</strong> {{ $countOfRecords }}</p>
    <p><strong>Sum of Due Amount:</strong> {{ $sumOfDueAmount }}</p>
    <p><strong>Sum of Paid Amount:</strong> {{ $sumOfPaidAmount }}</p>
    <p><strong>Sum of Concession:</strong> {{ $sumOfConcession }}</p>
    <p><strong>Sum of Scholarship:</strong> {{ $sumOfScholarship }}</p>
    <p><strong>Sum of Refund:</strong> {{ $sumOfRefund }}</p>
    
    <div class="button-container">
    
      <button class="button" onclick="window.location.href='{{ route('data-distribution') }}'" >Verify</button>
      <!-- <button class="button" onclick="cancel()">Cancel</button> -->
    </div>
  </div>
</div>

<script>
  function cancel() {
    // Implement cancel logic here
    alert('Cancel button clicked!');
  }
</script>

</body>
</html>

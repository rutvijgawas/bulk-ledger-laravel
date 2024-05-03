<!-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Progress Loader</title>
<style>
    body, html {
  height: 100%;
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: center;
}

.loader-container {
  text-align: center;
}

.loader {
  position: relative;
  width: 100px;
  height: 100px;
}

.progress {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #ddd;
}

.percentage {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 20px;
  color: #333;
}

</style>
</head>
<body>
<div class="loader-container">
  <h1>Loading...</h1>
  <p>Please wait while we load your data.</p>
  <p>Total jobs done:{{ $progress->totalJobs}}</p>
  <p>pending jobs: {{ $progress->pendingJobs}}</p>
  <p>processed jobs: {{ $progress->processedJobs()}}</p>
  <div class="loader">
    <div class="progress"></div>
    <div class="percentage">{{ $progress->progress()}}%</div>
  </div>
</div>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Progress Loader</title>
<style>
    body, html {
  height: 100%;
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: center;
}

.loader-container {
  text-align: center;
}

.loader {
  position: relative;
  width: 100px;
  height: 100px;
  margin-left: 65px;
}

.progress {
  position: absolute;
  top: 0;
  left: 0;
  width: 0%; /* Initially set to 0% */
  height: 100%;
  background-color: #ddd;
  transition: width 0.5s ease; /* Smooth transition effect */
}

.percentage {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 20px;
  color: #333;
}

/* Customize progress bar color based on percentage */
.progress {
  background-color: #ff0000; /* Red color */
}

/* Orange color for 25%-50% progress */
.progress[value="25"] { background-color: #ff6600; }
.progress[value="50"] { background-color: #ff6600; }

/* Yellow color for 50%-75% progress */
.progress[value="75"] { background-color: #ffcc00; }

/* Green color for more than 75% progress */
.progress[value="100"] { background-color: #00cc00; }

</style>
</head>
<body>
<div class="loader-container">
  <h1>Loading...</h1>
  <p>Please wait while we load your data.</p>
  <p>Total jobs done: <span id="total-jobs">{{ $progress->totalJobs}}</span></p>
  <p>Pending jobs: <span id="pending-jobs">{{ $progress->pendingJobs}}</span></p>
  <p>Processed jobs: <span id="processed-jobs">{{ $progress->processedJobs()}}</span></p>
  <div class="loader">
    <div class="progress"></div>
    <div class="percentage">{{$progress->progress()}}%</div>
  </div>
</div>
<script>
    // Simulated progress value for demonstration purposes
let progress = 0;
const totalJobs = parseInt(document.getElementById('total-jobs').innerText);
const pendingJobs = parseInt(document.getElementById('pending-jobs').innerText);
const processedJobs = parseInt(document.getElementById('processed-jobs').innerText);

const progressBar = document.querySelector('.progress');
const percentageText = document.querySelector('.percentage');


progressBar.style.width = {{$progress->progress()}} + '%';
progressBar.style.backgroundColor = getProgressColor({{$progress->progress()}});

// Function to update progress
function updateProgress() {
 location.reload();
}

// Function to determine progress bar color based on percentage
function getProgressColor(percentage) {
  if (percentage < 25) {
    return '#ff0000'; // Red color for less than 25% progress
  } else if (percentage < 50) {
    return '#ff6600'; // Orange color for 25%-50% progress
  } else if (percentage < 75) {
    return '#ffcc00'; // Yellow color for 50%-75% progress
  } else {
    return '#00cc00'; // Green color for more than 75% progress
  }
}

// Update progress every 500 milliseconds (for demonstration)
if({{$progress->progress()}} < 100){
    const progressInterval = setInterval(updateProgress, 5000);
}

</script>
</body>
</html>


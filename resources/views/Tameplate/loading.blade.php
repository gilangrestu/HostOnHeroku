<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.loader {
  border: 10px solid #f3f3f3;
  border-radius: 50%;
  border-top: 10px solid black;
  width: 100px;
  height: 100px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 1s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
body {
  margin: 0;
  padding: 0;
  width:100vw;
  height: 100vh;
  background-color: #eee;
}
.content {
  display: flex;
  justify-content: center;
  align-items: center;
  width:100%;
  height:100%;
}
.loader-wrapper {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  background-color: #242f3f;
  opacity: 0.4;
  display:flex;
  justify-content: center;
  align-items: center;
}
</style>
</head>
<body>
<div class="loader-wrapper">
      <div class="loader"></div>
    </div>
</body>
</html>

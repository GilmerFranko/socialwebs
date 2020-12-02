<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
	.rating {
overflow: hidden;
vertical-align: bottom;
display: inline-block;
width: auto;
height: 30px;
}
.rating > input {
opacity: 0;
margin-right: -100%;
}
.rating > label {
position: relative;
display: block;
float: right;
background: url('star-off-big.png');
background-size: 30px 30px;
}
.rating > label:before {
display: block;
opacity: 0;
content: '';
width: 30px;
height: 30px;
background: url('star-on-big.png');
background-size: 30px 30px;
transition: opacity 0.2s linear;
}
.rating > label:hover:before,
.rating > label:hover ~ label:before,
.rating:not(:hover) > :checked ~ label:before { opacity: 1; }

</style>
<body>
    <span class="rating">
<input id="rating5" type="radio" name="rating" value="5">
<label for="rating5">5</label>
<input id="rating4" type="radio" name="rating" value="4">
<label for="rating4">4</label>
<input id="rating3" type="radio" name="rating" value="3">
<label for="rating3">3</label>
<input id="rating2" type="radio" name="rating" value="2" checked>
<label for="rating2">2</label>
<input id="rating1" type="radio" name="rating" value="1">
<label for="rating1">1</label>
</span>
</body>
</html>
<!-- impress.js -->
<div class="hint">
	<?php echo $footer['hint']; ?>
</div>
<script>
if ("ontouchstart" in document.documentElement) {
	document.querySelector(".hint").innerHTML = "<?php echo $footer['hintTouch']; ?>";
}
if (window.location.hash && document.getElementById('hash')) {
	document.getElementById('hash').value = window.location.hash;
}
</script>
<script src="static/js/impress.js"></script>
<script>impress().init();</script>

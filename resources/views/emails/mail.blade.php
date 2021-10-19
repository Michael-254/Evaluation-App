<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
</head>

<body>
	<p>{{ $intro }}</p>

	<div>
		{!! '<p>'.$content.'</p>' !!}
		<small class="text-sm" style="color:#808080">
			Thanks,<br>
			HR Team<br>
			Better Globe Forestry LTD.
		</small>
		<br>
		<hr style="color:#808080" />
		<p style="color:#e6e6e6"><small>This email has been sent to on behalf of the <a href="https://evaluation.betterglobeforestry.co.ke" style="color:#e6e6e6">HR Team</a></small></p>
		<p style="color:#e6e6e6"><small>&copy; {{ \Carbon\Carbon::now()->format('Y') }} Copyright Better Globe Forestry LTD. All rights reserved.</small></p>
	</div>
</body>

</html>
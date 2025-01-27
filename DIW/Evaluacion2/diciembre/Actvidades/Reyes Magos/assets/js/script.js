function startCountdown() {
	const calculateTimeLeft = (targetDate) => {
		const now = new Date();
		const target = new Date(targetDate);
		if (now > target) {
			target.setFullYear(now.getFullYear() + 1);
		}
		const timeLeft = target - now;

		const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
		const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
		const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

		// Asegurar formato de dos dígitos
		const formatNumber = (num) => (num < 10 ? `0${num}` : num);

		return `${formatNumber(days)}:${formatNumber(hours)}:${formatNumber(minutes)}:${formatNumber(seconds)}`;
	};

	const updateCountdown = () => {
		document.getElementById('countdownChristmas').textContent = calculateTimeLeft(
			`${new Date().getFullYear()}-12-25T00:00:00`
		);
		document.getElementById('countdownEpiphany').textContent = calculateTimeLeft(
			`${new Date().getFullYear()}-01-06T00:00:00`
		);
	};

	setInterval(updateCountdown, 1000);
}

startCountdown();

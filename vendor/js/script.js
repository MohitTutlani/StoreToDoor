const tilts = document.querySelectorAll('.tilt');
const liveTilt = new UniversalTilt(tilts, {
	onMouseEnter: el => {
		el.style.boxShadow = '0 5px 50px rgba(211, 211, 211, 0.8)';
	},

	onMouseLeave: el => {
		el.style.boxShadow = '0 5px 50px rgba(230, 230, 230, 0)';
	},

	onDeviceMove: el => {
		el.style.boxShadow = '0 5px 50px rgba(211, 211, 211, 0.8)';
	}
});

const eventBox = document.querySelector('#event');
const outputContainer = document.querySelector('.output');


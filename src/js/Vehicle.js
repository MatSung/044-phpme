class Vehicle {
	constructor(make, model, year) {
		this.make  = make;
		this.model = model;
		this.year  = year;
	}

	setWheelsNumber(wheels) {
		this.wheels = wheels;
	}

	getIntroduction() {
		return `"${this.make} ${this.model}"`;
	}

	getAge() {
		return (new Date).getFullYear() -  this.year;
	}

	getAgeText() {
		if (this.getAge() <= 10) {
			return '10 years or newer';
		} else {
			return '11 years or older';
		}
	}

	getWheelsNumber() {
		return Number(this.wheels) || 0;
	}

	getWheelsNumberText() {
		return `${this.constructor.name} has ${this.getWheelsNumber()} wheels`;
	}

	getFuelType() {
		throw new Error('Fuel type not found');
	}
}
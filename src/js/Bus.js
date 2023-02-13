class Bus extends Vehicle {
	constructor(make, model, year, wheels) {
		super(make, model, year);

		this.wheels = wheels;
	}

	getFuelType() {
		return [2, 3];
	}
}
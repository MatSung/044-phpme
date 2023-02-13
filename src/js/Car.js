class Car extends Vehicle {
	constructor(make, model, year) {
		super(make, model, year);

		this.wheels = 4;
	}

	getFuelType() {
		return [1,2];
	}
}
/*
	File: Player.js 
	Author: Kevin Romero
	Class: CSC17B Team Blackjack
	Purpose: Player object for Blackjack
	Date: 10/16/17
*/

//create player class
function Player(){
	//member variables
	this.aShoe = new Shoe();
	this.aHand = new Hand();
	this.bust;

	//this.viewShoe();
	//this.firstDeal();
	//this.prntHand();
	//document.write("Hand Score: "+this.getTotScore()+"<br>");
	//document.write("Card in Hand: "+this.getCardsInHand()+"<br>");

	//constructor functions

};

Player.prototype.constructor=function(shoe){
	this.aShoe = shoe;
	this.isBust();
};

Player.prototype.winBJ=function(){
	if(this.getTotScore()==21 && this.getCardsInHand()==2){
		return true;
	}
};

Player.prototype.isBust=function(){
	if(this.getTotScore()>21){
		this.bust=true;
	}else{
		this.bust=false;
	}
};

Player.prototype.firstDeal=function(){
	this.aHand.initDraw(this.aShoe.dealCard(),this.aShoe.dealCard());
};

Player.prototype.getTotScore=function(){
	return this.aHand.getHandTotal();
};

Player.prototype.prntHand=function(){
	this.aHand.printHand();
};

Player.prototype.getCardsInHand=function(){
	return this.aHand.getNumCards();
};

//take another card;
Player.prototype.hit=function(){
	this.aHand.addCard(this.aShoe.dealCard());
};

//print deck
Player.prototype.viewShoe=function(){
	this.aShoe.printShoe();
};



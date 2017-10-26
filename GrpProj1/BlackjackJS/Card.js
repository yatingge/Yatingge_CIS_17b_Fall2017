/*
	File: Card.js 
	Author: Kevin Romero
	Class: CSC17B Team Blackjack
	Purpose: Card object for Blackjack
	Date: 10/16/17
*/


//Enums
var SUIT = Object.freeze({"SPADES":1, "HEARTS":2, "CLUBS":3,
										"DIAMONDS":4});
var FACE = Object.freeze({"ACE":1, "TWO":2, "THREE":3, "FOUR":4, "FIVE":5,
						"SIX":6, "SEVEN":7, "EIGHT":8, "NINE":9,
						"TEN":10,"JACK":11,"QUEEN":12,"KING":13,"fCount":14});


//Card Class
function Card(face,suit){
	//member variables
	this.m_suit;
	this.m_face;
	
	//constructor
	this.setCard(face,suit);
};

//Constructors
Card.prototype.setCard=function(face,suit){
	this.setFace(face);
	this.setSuit(suit);
};

/*Card.prototype.setCardI=function(i){
	this.setSuit(i/FACE.fCount);
	this.setFace(i%FACE.fCount);
}*/

//Mutators
Card.prototype.setFace=function(face){
	this.m_face=face;
};

Card.prototype.setSuit=function(suit){
	this.m_suit=suit;
};

//Accessors
Card.prototype.getSetCard=function(){
	return this.toStringFace(this.getFace())+" of "+this.toStringSuit(this.getSuit());
};

Card.prototype.getCardVal=function(face){
	switch(face){
		case FACE.JACK:
			return 10;
		case FACE.QUEEN:
			return 10;
		case FACE.KING:
			return 10;
		default: return face;
	}
};

Card.prototype.getGivenCard=function(face,suit){
	return this.toStringFace(face)+" of "+this.toStringSuit(suit);
};


Card.prototype.getFace=function(){
	return this.m_face;
};

Card.prototype.getSuit=function(){
	return this.m_suit;
};

//toString functions
Card.prototype.toStringSuit=function(suit){
	switch(suit){
		case 1:
			return "SPADES";
		case 2:
			return "HEARTS";
		case 3:
			return "CLUBS";
		case 4:
			return "DIAMONDS";
		default: return "ERROR";
	}
};

Card.prototype.toStringFace=function(face){
	switch(face){
		case 1:
			return "ACE";
		case 2:
			return "TWO";
		case 3:
			return "THREE";
		case 4:
			return "FOUR";
		case 5:
			return "FIVE";
		case 6:
			return "SIX";
		case 7:
			return "SEVEN";
		case 8:
			return "EIGHT";
		case 9:
			return "NINE";
		case 10:
			return "TEN";
		case 11:
			return "JACK";
		case 12:
			return "QUEEN";
		case 13:
			return "KING";
		default:
			return "ERROR";
	}
};




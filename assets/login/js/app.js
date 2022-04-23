
  
  var app = angular.module('store', [ ]);
  
  app.controller('StoreController', function(){
	  this.products = gems; 
  });

  var gems = [
		 {
			name: 'Project One',
			directorate: 'IT',
			division: 'Portal',
			pic: 'Nico',
			progress: 80,
			canPurchase:true,
			soldOut: true,
			images: [
						{
							full: '01-full.jpg',
							thumb: '01-thumb.jpg'
						}
			],
			details: [
						{
						plan: "membuat RKAP",
						start: "28-01-2014",
						end: "28-04-2014",
						obstacle: "Macet",
						status: "On Progress",
						actionPlan: "action one",
						},
						{
						plan: "membuat RKAP2",
						start: "28-02-2014",
						end: "28-05-2014",
						obstacle: "Macet2",
						status: "On Progress",
						actionPlan: "action two",
						}
			]
		},
		{
			name: "Project Two",
			directorate: 'IT',
			division: 'Infrastructure',
			pic: 'Dennis',
			progress: 40,
			canPurchase: true,
			soldOut: true,
			images: [
						{
							full: "02-full.jpg",
							thumb: '02-thumb.jpg'
						}
			],
			details: [
						{
						plan: "membuat xRKAP",
						start: "28-01-2014",
						end: "28-04-2014",
						obstacle: "Macet",
						status: "On Progress",
						actionPlan: "action one",
						},
						{
						plan: "membuat xRKAP2",
						start: "28-02-2014",
						end: "28-05-2014",
						obstacle: "Macet2",
						status: "On Progress",
						actionPlan: "action two",
						}
			]
		}
	  ];
	  
  app.controller("PanelController", function(){
		this.tab = 1;
		this.selectTab = function(setTab) {
			this.tab = setTab;
		};
		this.isSelected = function(checkTab){
			return this.tab === checkTab;
		};
  });
  
 app.controller("DetailController", function(){
 	this.detail = {};
	this.addDetail = function(product) {
		product.details.push(this.detail);
		this.detail = {};
	};
 });



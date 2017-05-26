function date($scope){
	$scope.years = ['Year'];

    for(i=2017;i>=1905;i--){
	  $scope.years.push(i);
    }
	$scope.days = ['Day',1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]; 
	$scope.months = ['Month','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec'];
	$scope.languages = ['हिन्दी', 'ਪੰਜਾਬੀ', 'اردو', 'ગુજરાતી', 'বাংলা', 'தமிழ்', 'తెలుగు', 'മലയാളം', 'ಕನ್ನಡ', 'Español'];
	$scope.footlinks = ['Sign Up', 'Log In', 'Messenger', 'Facebook Lite', 'Mobile', 'Find Friends', 'People', 'Pages', 'Places', 'Games', 'Locations', 'Celebrities', 'Marketplace',
	                    'Groups', 'Recipes', 'Moments', 'Instagram', 'About', 'Create Advert', 'Create Page', 'Developers', 'Careers', 'Privacy', 'Cookies', 'AdChoices', 'Terms',
	                    'Help'] ;
}
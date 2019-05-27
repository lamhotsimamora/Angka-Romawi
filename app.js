
	new Vue({
		el : '#romawi',
		data : {
			hasil_romawi  : ''
		}
		,
		methods: {
		    romawi: function (data) {
		        $angka = $('#txt_angka').val();

		        if ($angka==='' || $angka==null)
		        {
		        	$('#txt_angka').focus();
		        	return;
		        }
		        var self = this;

				var data = new URLSearchParams();
				data.append('_angka', $angka);

				axios.post('romawi.php', data)
				.then(function($response){
					self.hasil_romawi = $response.data;
					$('#txt_angka').focus();
				}); 
		    }
		    ,
		    clear : function(){
		    	$('#txt_angka').val('');
		    	this.hasil_romawi = '';
		    	$('#txt_angka').focus();
		    }
		  }
	});
	var $start_random;
	new Vue({
		el : '#table',
		data : {
			romawi_randoms : [
				
			],
			display : false,
			message : ""
		}
		,
		methods: {
		    generateAuto: function (data) {
		        $limit_angka = $('#txt_limit').val();
		       
		        if ($limit_angka==='' || $limit_angka==null)
		        {
		        	$('#txt_limit').focus();
		        	return;
		        }

		        if ($limit_angka>=5000)
		        {
		        	this.message = "Maximum 5000 !";
		        	this.display = true;
		        	$('#txt_limit').focus();
		        	return;
		        }
		        this.message = '';
		        this.display=false;
		       	$start_random = 1;
		        this.romawi_randoms = [];
		        $limit_angka = parseInt($limit_angka);
		        $limit_angka++;
		      	this.process($limit_angka);
		    },
		    process: function($limit_angka){
		    	var $limit_angka = parseInt($limit_angka);
		    	
		    	if ($start_random==$limit_angka)
		    	{
		    		return;
		    	}
		    	var self = this;

	        	var data = new URLSearchParams();
				data.append('_angka', $start_random);
				axios.post('romawi.php', data)
				.then(function($response){
					self.romawi_randoms.push(
						{ angka : $start_random, romawi : $response.data }
					)
					$start_random++;
					self.process($limit_angka);
				}); 
		    },
		    clear : function(){
		    	$('#txt_limit').val('');
		    	this.romawi_randoms = [];
		    	$('#txt_limit').focus();
		    },
		    saveToJson : function(){
		    	if (this.romawi_randoms.length==0)
		    	{
		    		return;
		    	}
		    	var $text = JSON.stringify(this.romawi_randoms);
		    	var $filename = 'Angka Romawi';
		    	download($text, $filename+".txt", "text/plain");
		    }
		  }
	});


	$('#txt_angka').focus();


	function goToGithub(){
		 window.open('https://github.com/lamhotsimamora/Angka-Romawi','_blank');
	}
	function goToFork(){
		 window.open('https://github.com/lamhotsimamora/Angka-Romawi/fork','_blank');
	}
	
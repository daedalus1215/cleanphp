<?php





describe('InputFilter\Customer', function () {
    beforeEach(function () {
        $this->inputFilter = new \CleanPhp\Invoicer\Domain\Service\InputFilter\CustomerInputFilter();
    });
    
    
    
    describe('isValid()', function () {
        it('should require a name', function () {   

            $isValid = $this->inputFilter->setData([])->isValid();
            
            $error = [
                'isEmpty' => 'Value is required and can\'t be empty'
            ];
            
            $messages = $this->inputFilter->getMessages()['name'];
            expect($isValid)->to->equal(false);
            expect($messages)->to->equal($error);
        });
        
        
        
        
        
        it('should require an email', function () {
           $isValid = $this->inputFilter->setData([])->isValid();
           
           $error = [
               'isEmpty' => 'Value is required and can\'t be empty'
           ];
           
           $messages = $this->inputFilter->getMessages()['email'];
           
           expect($isValid)->to->equal(false);
           expect($messages)->to->equal($error);
        });
        
        it('should require a valid email', function () {
            $scenarios = [
                [
                    'value' => 'bob',
                    'errors' => []
                ],
                [
                    'value' => 'bob@bob',
                    'errors' => []
                ],
                [
                    'value' => 'bob',
                    'errors' => null
                ]            
            ];
            
            foreach($scenarios as $scenario) {
                $this->inputFilter->setData(['email' => $scenario['value']])->isValid();
                
                $messages = $this->inputFilter
                        ->getMessages()['email'];
                
                if (is_array($messages)) {
                    expect($messages)->to->be->a('array');
                    expect($messages)->to->not->be->empty();
                } else {
                    expect($messages)->to->be->null();
                }
            }
        });
    });
});

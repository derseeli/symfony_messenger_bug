### Requirements
* php 8.1
* symfony-cli
* docker
* docker-compose

### How to setup:
* composer install
* docker-compose up -d
* symfony console debug:mess

### Problem (TLDR)
When using multiple messenger buses and defining them in config/services.yaml the priority in the php attribute AsMessageHandler is ignored.



### Expected output:
```
Messenger
=========

command.bus
-----------

The following messages can be dispatched:

 ------------------------------------------------------------------- 
App\Message\Command\ImportAttributes                               
    handled by App\MessageHandler\Command\ImportAttributesHandler

App\Message\Command\ImportCategory                                 
    handled by App\MessageHandler\Command\ImportCategoryHandler

App\Message\Command\ImportNode                                     
    handled by App\MessageHandler\Command\ImportNodeHandler

App\Message\Command\ImportText                                     
    handled by App\MessageHandler\Command\ImportTextHandler
                                                                     
------------------------------------------------------------------- 

event.bus
---------

The following messages can be dispatched:

 ------------------------------------------------------------------------------- 

App\Message\Event\NodeImported                                                 
    handled by App\MessageHandler\Event\WhenNodeImported\NotifyBackend         
    handled by App\MessageHandler\Event\WhenNodeImported\ImportNodeCategory    
    handled by App\MessageHandler\Event\WhenNodeImported\ImportNodeText        
    handled by App\MessageHandler\Event\WhenNodeImported\ImportNodeAttributes  

------------------------------------------------------------------------------- 
```

### Getting (the priority at the event.bus NodeImported MessageHandler is incorrect):
```
Messenger
=========

command.bus
-----------

 The following messages can be dispatched:

 ------------------------------------------------------------------- 
  App\Message\Command\ImportAttributes                               
      handled by App\MessageHandler\Command\ImportAttributesHandler  
                                                                     
  App\Message\Command\ImportCategory                                 
      handled by App\MessageHandler\Command\ImportCategoryHandler    
                                                                     
  App\Message\Command\ImportNode                                     
      handled by App\MessageHandler\Command\ImportNodeHandler        
                                                                     
  App\Message\Command\ImportText                                     
      handled by App\MessageHandler\Command\ImportTextHandler        
                                                                     
 ------------------------------------------------------------------- 

event.bus
---------

 The following messages can be dispatched:

 ------------------------------------------------------------------------------- 
  App\Message\Event\NodeImported                                                 
      handled by App\MessageHandler\Event\WhenNodeImported\ImportNodeAttributes  
      handled by App\MessageHandler\Event\WhenNodeImported\ImportNodeCategory    
      handled by App\MessageHandler\Event\WhenNodeImported\ImportNodeText        
      handled by App\MessageHandler\Event\WhenNodeImported\NotifyBackend         
                                                                                 
 ------------------------------------------------------------------------------- 
```

When deleting all lines after line 22 in config/service.yaml the MessageHandler priority is correct, but all messages are handled in all buses.

```
Messenger
=========

command.bus
-----------

 The following messages can be dispatched:

 ------------------------------------------------------------------------------- 
  App\Message\Command\ImportAttributes                                           
      handled by App\MessageHandler\Command\ImportAttributesHandler              
                                                                                 
  App\Message\Command\ImportCategory                                             
      handled by App\MessageHandler\Command\ImportCategoryHandler                
                                                                                 
  App\Message\Command\ImportNode                                                 
      handled by App\MessageHandler\Command\ImportNodeHandler                    
                                                                                 
  App\Message\Command\ImportText                                                 
      handled by App\MessageHandler\Command\ImportTextHandler                    
                                                                                 
  App\Message\Event\NodeImported                                                 
      handled by App\MessageHandler\Event\WhenNodeImported\NotifyBackend         
      handled by App\MessageHandler\Event\WhenNodeImported\ImportNodeCategory    
      handled by App\MessageHandler\Event\WhenNodeImported\ImportNodeText        
      handled by App\MessageHandler\Event\WhenNodeImported\ImportNodeAttributes  
                                                                                 
 ------------------------------------------------------------------------------- 

event.bus
---------

 The following messages can be dispatched:

 ------------------------------------------------------------------------------- 
  App\Message\Command\ImportAttributes                                           
      handled by App\MessageHandler\Command\ImportAttributesHandler              
                                                                                 
  App\Message\Command\ImportCategory                                             
      handled by App\MessageHandler\Command\ImportCategoryHandler                
                                                                                 
  App\Message\Command\ImportNode                                                 
      handled by App\MessageHandler\Command\ImportNodeHandler                    
                                                                                 
  App\Message\Command\ImportText                                                 
      handled by App\MessageHandler\Command\ImportTextHandler                    
                                                                                 
  App\Message\Event\NodeImported                                                 
      handled by App\MessageHandler\Event\WhenNodeImported\NotifyBackend         
      handled by App\MessageHandler\Event\WhenNodeImported\ImportNodeCategory    
      handled by App\MessageHandler\Event\WhenNodeImported\ImportNodeText        
      handled by App\MessageHandler\Event\WhenNodeImported\ImportNodeAttributes  
                                                                                 
 ------------------------------------------------------------------------------- 
```

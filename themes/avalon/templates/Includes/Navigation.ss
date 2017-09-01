<ul class="nav navbar-nav">
	<% loop $Menu(1) %>
		<li class="$LinkingMode">
			
				
				<% if $Children %>
					
					<a href="#reveal{$ID}" data-toggle="collapse" title="$Title.XML" class="hidden-sm hidden-md  hidden-lg">
						$MenuTitle.XML 	
						<i class="pull-right fa fa-caret-down"></i> 
					</a>
					
					<a href="$Link" title="$Title.XML" class="hidden-xs">
						$MenuTitle.XML 
						&nbsp;<i class="pull-right fa fa-caret-down"></i> 
					</a>
					<ul id="reveal{$ID}" class="collapse">
						
						<li class="$LinkingMode " >
							<a href="$Link" class="$LinkingMode" title="Go to the $Title.XML page">					
								$MenuTitle.XML					
							</a>
						</li>
						<% include RecursiveMenu %>	
					</ul>
				<% else %>
				
					
					
					<a href="$Link" title="$Title.XML">
						$MenuTitle.XML 						
					</a>
				
				<% end_if %>
			
			
			
			
		</li>
	<% end_loop %>
	
	
	<% if $CurrentMember %>
		<li>
			<a href="Security/logout" title="$Title.XML">Log Out</a>
		</li>	 
	<% end_if %>
</ul>
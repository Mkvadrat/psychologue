<div class="wrap">
	<h1><?php echo _e('WP Admin Category Search Settings', $this->_optionsGroup); ?></h1>
	<div>
		<h3><?php echo _e('Manage the places where you want to have search', $this->_optionsGroup); ?></h3>
		<hr/>
		<form method="post" action="options.php">
			<?php settings_fields( $this->_optionsGroup ); ?>
			<?php foreach( $this->_options as $key => $option ): ?>
			<p>
				<input 
					type="checkbox" 
					name="<?php echo $this->_optionsPrefix.$key;?>" 
					value="1" 
					<?php checked('1', $option['value']); ?>
					id="<?php echo $this->_optionsPrefix.$key;?>"
				/>
				<strong><?php echo _e($option['name'], $this->_optionsGroup); ?></strong>
				&nbsp;-&nbsp;
				<?php echo _e($option['description'], $this->_optionsGroup); ?>
			</p> 
			<?php endforeach; ?>
			<?php submit_button(); ?>
		</form>
	</div>
</div>
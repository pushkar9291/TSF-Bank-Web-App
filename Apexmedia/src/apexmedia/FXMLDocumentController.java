/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package apexmedia;

import java.io.File;
import java.net.URL;
import java.time.Duration;
import java.util.ResourceBundle;
import javafx.beans.InvalidationListener;
import javafx.beans.Observable;
import javafx.beans.binding.Bindings;
import javafx.beans.property.DoubleProperty;
import javafx.beans.value.ChangeListener;
import javafx.beans.value.ObservableValue;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Label;
import javafx.scene.control.Slider;
import javafx.scene.input.MouseEvent;
import javafx.scene.media.Media;
import javafx.scene.media.MediaPlayer;
import javafx.scene.media.MediaView;
import javafx.stage.FileChooser;


public class FXMLDocumentController implements Initializable {
 
    private MediaPlayer mediaPlayer;
    @FXML
    
    private MediaView mediaView;
    private String filepath;
    @FXML
    private Slider slider;
    @FXML
    private Slider seekSlider;
    
    @FXML
    private void handleButtonAction(ActionEvent event) {
       FileChooser filechooser=new FileChooser();
       FileChooser.ExtensionFilter filter=new FileChooser.ExtensionFilter("Select a File (*.mp4)","*.MP4" );
       
       filechooser.getExtensionFilters().add(filter);
       File file=filechooser.showOpenDialog(null);
       filepath=file.toURI().toString();
       
       if(filepath != null)
       {
            Media media=new Media(filepath);
           mediaPlayer =new MediaPlayer(media);
           mediaView.setMediaPlayer(mediaPlayer);
           mediaPlayer.play();
                DoubleProperty width=mediaView.fitWidthProperty();
                DoubleProperty height=mediaView.fitHeightProperty();
                
                width.bind(Bindings.selectDouble(mediaView.sceneProperty(),"width"));
                height.bind(Bindings.selectDouble(mediaView.sceneProperty(),"height"));
                
                slider.setValue(mediaPlayer.getVolume() * 100);
                slider.valueProperty().addListener(new InvalidationListener(){
                    @Override 
                    public void invalidated(Observable observable){
                        mediaPlayer.setVolume(slider.getValue()/100);
                        
                    }
                    
                });
                
                mediaPlayer.currentTimeProperty().addListener(new ChangeListener<javafx.util.Duration>() {
                @Override
                public void changed(ObservableValue<? extends javafx.util.Duration> observable, javafx.util.Duration oldValue, javafx.util.Duration newValue) {
                    seekSlider.setValue(newValue.toSeconds());
                }
                });
                
                seekSlider.maxProperty().bind(Bindings.createDoubleBinding(
                            () -> mediaPlayer.getTotalDuration().toSeconds(),

                             mediaPlayer.totalDurationProperty()));

                
                
                seekSlider.setOnMouseClicked(new EventHandler<MouseEvent>() {
                @Override
                public void handle(MouseEvent event) {
                    mediaPlayer.seek(javafx.util.Duration.seconds(seekSlider.getValue()));
                }
            });
               mediaPlayer.play();
       }
    }
    @FXML
    private void playButtonAction(ActionEvent event) {
        mediaPlayer.play();
        mediaPlayer.setRate(1);
        
    }
      @FXML
    private void pauseButtonAction(ActionEvent event) {
        mediaPlayer.pause();
        
    }
      @FXML
    private void stopButtonAction(ActionEvent event) {
        
        mediaPlayer.stop();
    }
      @FXML
    private void slowButtonAction(ActionEvent event) {
        mediaPlayer.setRate(.75);
    }
      @FXML
    private void slowerButtonAction(ActionEvent event) {
        mediaPlayer.setRate(0.50);
        
    }
      @FXML
    private void fastButtonAction(ActionEvent event) {
        
        mediaPlayer.setRate(1.5);
    }
      @FXML
    private void fasterButtonAction(ActionEvent event) {
        
        mediaPlayer.setRate(2);
    }
      @FXML
    private void exitButtonAction(ActionEvent event) {
        
        System.exit(0);
    }
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        
    }    
    
}

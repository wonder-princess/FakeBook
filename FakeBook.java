import java.awt.*;
import java.awt.event.*;
import java.awt.CardLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.*;

public class FakeBook extends JFrame {
    JPanel dispHome = new JPanel();
    JPanel dispLogin = new JPanel();


    private static final long serialVersionUID = 1L;
    public static void main(String args[]) {
        new FakeBook();
    }


    JTextField loginAccount = new JTextArea();
    JPasswordField loginPassword = new JPasswordField('*');


    public FakeBook() {
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        this.setVisible(true);
        this.setBounds( 20, 20, 500, 800 );
        this.dispHome.setLayout( null );
        this.setTitle("FakeBook");
        this.setContentPane(this.dispHome);

        JButton loginButton = new JButton("ログイン");
        loginButton.setBounds(50, 200, 100, 20);
        dispHome.add(loginButton);
        loginButton.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                new LoginDisp();
            }
        });
    }

    class LoginDisp extends JFrame {
        private static final long serialVersionUID = 1L; 
        public LoginDisp() {
            this.setVisible(true);
            this.setBounds( 100, 100, 200, 300 );
            this.setTitle("ログイン");
            this.setContentPane(dispLogin);
            dispLogin.setLayout( null );
            JButton loginButton = new JButton("ログイン");
            ActionListener login = new Login();
            loginButton.addActionListener(login);
            addComponent(dispLogin, loginAccount, loginPassword, loginButton);
            loginAccount.setBounds(50, 50, 100, 20);
            loginPassword.setBounds(50, 150, 100, 20);
            loginButton.setBounds(50, 200, 100, 20);
        }

    }

    public class Login extends JButton implements ActionListener {
        private static final long serialVersionUID = 1L;
        public Login() {
            super();
            this.addActionListener(this);
        }
		public void actionPerformed(ActionEvent evt) {
            String account = new String(loginAccount.getText());
            String pass = new String(loginPassword.getPassword());

            if(account.equals("0000") || pass.equals("0000")){

            } else {
                JLabel error = new JLabel("アカウント名・パスワードが違います");
                JOptionPane.showMessageDialog(this, error, "失敗", JOptionPane.ERROR_MESSAGE);     
            }
		}
    }


    void addComponent(JPanel panleName, Component... components){
        for(int i = 0; i < components.length; i++){
            panleName.add(components[i]);
        }
    }

    void setPlace(int placeHeight, Component... components){
        int placeWidth;
        placeHeight += 20;
        for(int i = 0, j = 0; i < components.length; i++, j++){
            placeWidth = 30+120*j;
            if(placeWidth + 100 >= 500){
                placeHeight += 20;
                placeWidth = 30;
                j = 0;
            }
            components[i].setBounds(placeWidth, placeHeight, 100, 20);
        }
    }

    JLabel[] makeLabel(String[] labelDispName){
        JLabel[] labels = new JLabel[labelDispName.length];
        for (int i=0; i < labelDispName.length; i++){
            labels[i] = new JLabel(labelDispName[i]);
        }
    return labels;
    }
}
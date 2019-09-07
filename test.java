import java.awt.*;
import java.awt.event.*;
import java.awt.CardLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.*;


public class Test extends JFrame /*implements ActionListener*/{
    private static final long serialVersionUID = 1L;
    public static void main(String args[]) {
        new Test();
    }

    private JPanel mainPanel;
    JPasswordField password = new JPasswordField('*');

    private static final String PANEL_A = "画面A";
    private static final String PANEL_B = "画面B";

    public Test() {
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setSize(300, 300);
        setLocationRelativeTo(null);

        //複数のパネルを乗せ, 名前で切り替える土台となるパネル
        mainPanel = new JPanel();
        mainPanel.setLayout(new CardLayout()); //CardLayoutは重なったパネルを切り替えることができます.

        //1枚目
        JPanel panelA = createPanelA();
        mainPanel.add(panelA, PANEL_A);

        //2枚目
        JPanel panelB = createPanelB();
        mainPanel.add(panelB, PANEL_B);

        //起動時は一枚目を表示
        ((CardLayout)(mainPanel.getLayout())).show(mainPanel, PANEL_A);

        getContentPane().add(mainPanel);
        setVisible(true);
    }

    private JPanel createPanelA() {
        JPanel panel = new JPanel(null);
        JLabel text = new JLabel("pass");
        JButton goPanelB = new JButton("画面Bへ移動");
        text.setSize(150, 20);
        password.setSize(150, 20);
        goPanelB.setSize(200, 20);
        text.setLocation(50, 50);
        password.setLocation(50, 90);
        goPanelB.setLocation(50, 200);
        ActionListener login = new Login();
        goPanelB.addActionListener(login);
        addComponent(panel, text, goPanelB, password);
        return panel;
    }

    private JPanel createPanelB() {
        JPanel panel=new JPanel();
        JLabel title = new JLabel("画面B");
        JButton goPanelA = new JButton("画面Aへ移動");
        title.setSize(100, 50);
        goPanelA.setSize(200, 50);
        title.setLocation(150, 100);
        goPanelA.setLocation(150, 200);
        goPanelA.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                ((CardLayout)(mainPanel.getLayout())).show(mainPanel, PANEL_A);
            }
        });
        panel.add(title);
        panel.add(goPanelA);
        return panel;
    }
    void addComponent(JPanel panleName, Component... components){
        for(int i = 0; i < components.length; i++){
            panleName.add(components[i]);
        }
    }
}

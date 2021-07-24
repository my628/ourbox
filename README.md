# 配置你的ROS2环境

**目标** ：这个教程将向你演示如何去准备ROS2环境。

**教程等级** ：初学者

**用时** ：5分钟

**内容** ：

- ## 背景
    ROS2依赖于使用 shell 环境来组合工作区的概念。“工作区”是一个ROS术语，用来表示ROS2开发在你系统上的位置。
    核心的ROS2工作区称为底层。 后续的本地工作区称为叠加层。
    当进行ROS2开发时，你通常会有多个工作区同时处于激活状态。
    
    组合工作区可以更轻松地针对不同版本的ROS2或针对不同的软件包集进行开发。
    它还允许在同一台计算机上安装多个ROS2发行版(例如Dashing和Eloquent)并在它们之间进行切换。
    
    这是通过在每次打开新shell时获取安装文件，或通过将source命令添加到shell启动脚本一次来实现的。
    如果不获取安装文件，你将无法访问ROS2的命令，也无法找到或使用ROS2的包。 换句话说，你将无法使用ROS2。
    
- ## 先决条件
    在开始这些教程之前，请按照ROS2安装页面上的说明安装ROS2。
    
    本教程中使用的命令假设您遵循了操作系统的二进制包安装指南（Linux的Debian包）。
    如果你是从源代码构建的，你仍然可以继续，但你的安装文件的路径可能会有所不同。
    如果你是从源代码安装的，你也将无法使用```sudo apt install ros-<distro>-<package>```命令（在初学者级别的教程中经常使用）。
    
    如果你使用的是Linux或macOS，但还不熟悉shell，本教程将有所帮助。
    
- ## 任务
    1. 读取并执行setup文件中的shell命令
        你需要在新打开的每个shell上运行这个命令才能访问ROS2命令，如下所示：
        ```bash
        source /opt/ros/galactic/setup.bash
        ```
        > 确切的命令取决于您安装ROS2的位置。如果您遇到问题，请确保文件路径指向您的安装。

    2. 添加sourcing到你的shell启动脚本
        如果你不想在每次打开新shell时都获取安装文件的源代码（跳过任务1），那么你可以将此命令添加到你的shell启动脚本中：
        ```bash
        echo "source /opt/ros/galactic/setup.bash" >> ~/.bashrc
        ```
     
     3. 添加colcon_cd到你的shell启动脚本
         命令colcon_cd允许你快速将shell当前的工作目录更改为包目录。 
         例如colcon_cd some_ros_package会很快带你到目录~/ros2_install/src/some_ros_package。
         ```bash
         echo "source /usr/share/colcon_cd/function/colcon_cd.sh" >> ~/.bashrc
         echo "export _colcon_cd_root=~/ros2_install" >> ~/.bashrc
         ```
         根据你安装colcon_cd的方式和你的工作区所在的位置，上述说明可能会有所不同，请参阅文档了解更多详细信息。 
         要在Linux和macOS中撤消此操作，请找到系统shell的启动脚本并删除附加的source和export命令。
  
     4. 检查环境变量
         读取和执行ROS2安装文件中的shell命令将设置操作ROS2所需的几个必要的环境变量。 
         如果你在查找或使用ROS2包时遇到问题，请确保使用以下命令正确设置你的环境：
         ```bash
         printenv | grep -i ROS
         ```
         检查是否设置了ROS_DISTRO和ROS_VERSION等变量。
         ```bash
         ROS_VERSION=2
         ROS_PYTHON_VERSION=3
         ROS_DISTRO=galactic
         ```
         如果环境变量设置不正确，请返回你遵循的安装指南的ROS2包安装部分。 
         如果你需要更具体的帮助（因为环境设置文件可能来自不同的地方），你可以从社区获得答案。
         
         
 - ## 总结
    使用前需要正确配置ROS2开发环境。 
    这可以通过两种方式完成：在你新打开的每个shell中读并执行安装文件中的shell命令，或者将source命令添加到你的启动脚本中。

    如果你在ROS2中定位或使用包时遇到任何问题，你应该做的第一件事是检查你的环境变量并确保它们设置为你想要的版本和发行版。
    
- ## 下一步
    现在你已经安装了ROS2并且知道如何读取并执行其安装文件中的shell命令，你可以开始使用turtlesim工具学习ROS2的来龙去脉。



# 介绍turtlesim和rqt

**目标** ：安装并使用turtlesim包和rqt工具为即将到来的教程做准备。

**教程等级** ：初学者

**用时** ：15分钟

**内容** ：


- ## 背景
Turtlesim是一个用于学习ROS2的轻量级模拟器。它在最基本的层面上阐明了ROS2的作用，让你了解稍后将使用真实机器人或机器人模拟器来做什么。

rqt是ROS2的GUI工具。
在rqt中所做的一切都可以在命令行上完成，但它提供了一种更简单、更用户友好的方式来操纵ROS2的元件。

本教程涉及核心的ROS2概念，例如节点、主题和服务的分离。 
所有这些概念将在后面的教程中详细说明； 现在，您只需设置工具并感受一下它们。



- ## 先决条件
上一个教程，[配置你的ROS2环境]()，将向你展示如何设置你的环境。


- ## 任务

    1. ### 安装海龟模拟器
        与往常一样，首先在新终端中读取并执行设置文件中shell命令，如上一教程中所述。
        为你的ROS2发行版安装turtlesim包：
        ```bash
        sudo apt update
        sudo apt install ros-galactic-turtlesim
        ```
        检查是否安装了软件包：
        ```bash
        ros2 pkg executables turtlesim
        ```
        上面的命令应该返回一个turtlesim的可执行文件列表：
        ```
        turtlesim draw_square
        turtlesim mimic
        turtlesim turtle_teleop_key
        turtlesim turtlesim_node
        ```
    
    2. ### 启动海龟模拟器
        要启动海龟模拟器，请在终端中输入以下命令：
        ```
        ros2 run turtlesim turtlesim_node
        ```
        模拟器窗口应该出现，中间有一个随机的海龟。
        
        ![图片alt](http://docs.ros.org/en/galactic/_images/turtlesim.png)
        
        在命令下的终端中，你将看到来自节点的消息：
        ```
        [INFO] [turtlesim]: Starting turtlesim with node name /turtlesim
        [INFO] [turtlesim]: Spawning turtle [turtle1] at x=[5.544445], y=[5.544445], theta=[0.000000]
        ```
        
    3. ### 使用海龟模拟器
        
        打开一个新终端并再次获取ROS2。

        现在你将运行一个新节点来控制第一个节点中的海龟：
        
        ```bash
        ros2 run turtlesim turtle_teleop_key
        ```
        
        此时你应该打开三个窗口：一个运行turtlesim_node的终端，一个运行turtle_teleop_key的终端和turtlesim窗口。 
        排列这些窗口，以便您可以看到turtlesim窗口，同时还要使运行turtle_teleop_key 的终端处于活动状态，以便您可以在turtlesim 中控制海龟。
        
        使用键盘上的箭头键来控制乌龟。 它将在屏幕上移动，使用其附带的“笔”绘制到目前为止所遵循的路径。
        
        > 按箭头键只会使海龟移动一小段距离然后停止。 这是因为，实际上，如果操作员失去与机器人的连接，您不希望机器人继续执行指令。
        
        您可以使用 list 命令查看节点及其关联的服务、主题和操作：
        
        ```bash
        ros2 node list
        ros2 topic list
        ros2 service list
        ros2 action list
        ```

    4. ### 安装rqt
        
        打开一个新终端来安装rqt及其插件：
        
        ```bash
        sudo apt update
        sudo apt install ~nros-galactic-rqt*
        ```
        
        运行rqt
        
        ```bash
        rqt
        ```

    5. ### 使用rqt
    
        第一次运行rqt后，窗口将是空白的。
        不用担心; 只需从顶部的菜单栏中选择插件 > 服务 > 服务调用者。
        
        > rqt可能需要一些时间来定位所有插件本身。 
        > 如果你单击插件，但没有看到服务或任何其他选项，则应关闭rqt，在终端中输入命令 ```rqt --force-discover``` 。
        
        ![图片alt](http://docs.ros.org/en/galactic/_images/rqt.png)
        
        使用服务下拉列表左侧的刷新按钮确保您的海龟模拟器节点的所有服务都可用。

        单击服务下拉列表查看海龟模拟器的服务，然后选择/spawn服务。
        
        1. #### 尝试spawn服务
        
            让我们使用rqt来调用/spawn服务。 
            你可以从它的名字中猜出/spawn会在turtlesim窗口中创建另一只海龟。
            
            通过在表达式列中的空单引号之间双击，为新海龟指定一个唯一名称，例如turtle2。 
            可以看到，这个表达式对应的是名称值，并且是字符串类型。

            输入海龟生成的新坐标，例如 x = 1.0 和 y = 1.0。
            
            ![图片alt](http://docs.ros.org/en/galactic/_images/spawn1.png)
            
            > 如果你尝试生成与现有海龟同名的新海龟，例如默认的turtle1，那么你将在运行turtlesim_node的终端中收到一条错误消息：
            
            ```
            [ERROR] [turtlesim]: A turtle named [turtle1] already exists
            ```
            
            要生成turtle2，您必须通过单击rqt 窗口右上角的Call按钮来调用该服务。
            你将看到在你输入的x和y坐标处生成了一只新海龟（再次采用随机设计）。

            如果刷新rqt中的服务列表，你还会看到现在除了/turtle1/...之外，还有与新乌龟相关的服务，/turtle2/...。
            
        2. #### 尝试set_pen服务
            
            现在让我们使用/set_pen服务给turtle1一个独有的笔：
            
            ![图片alt](http://docs.ros.org/en/galactic/_images/set_pen.png)
            
            r、g和b的值在0到255之间，将设置海龟1笔绘制的颜色，width设置线条的粗细。

            要让海龟1绘制一条明显的红线，请将r的值更改为255，将width的值更改为5。不要忘记在更新值后调用服务。

            如果你回到运行turtle_teleop_node的终端，按方向键，你会看到海龟1的笔已经改变了。
            
            ![图片alt](http://docs.ros.org/en/galactic/_images/new_pen.png)
            
            你可能已经注意到无法移动海龟2。 
            你可以通过将海龟1的cmd_vel主题重新映射到海龟2来实现此目的。
            
  
    6. ### 重映射
    
        在一个新终端中，输入然后运行：
        
        ```bash
        ros2 run turtlesim turtle_teleop_key --ros-args --remap turtle1/cmd_vel:=turtle2/cmd_vel
        ```
        
        现在你可以在此终端处于活动状态时移动海龟2，并在运行turtle_teleop_key的另一个终端处于激活状态时移动海龟1。
        
        
    7. ### 关闭海龟模拟器

        要停止模拟，你可以在turtlesim_node终端中输入Ctrl + C，在teleop终端中输入q。
        

- ## 总结
    使用turtlesim和rqt是学习ROS 2核心概念的好方法。
    
- ## 下一步
    现在你已经启动并运行了海龟模拟器和rqt，并且了解了它们的工作原理，让我们在下一个教程[理解ROS2节点]()中深入探讨ROS2的第一个核心概念。
    
- ## 相关内容
    可以在ros_tutorials存储库中找到海龟模拟器的包。 
    确保调整分支以查看与你安装的ROS2发行版相对应的海龟模拟器版本。

    这个社区贡献的视频演示了本教程中涵盖的许多项目。
    
    
    

# 理解ROS2 nodes

**目标** ：学习ROS2中关于nodes的函数和与它们互动的工具。

**教程等级** ：初学者

**用时** ：10分钟

**内容** ：

- ## 背景
    1. ### ROS2图
    在接下来的的教程，你将学习关于构成所谓ROS2图的一系列核心概念。
    ROS2图是一个ROS2元素们同时处理数据的网络。
    它包含
    如果您要将   所有可执行文件和它们之间的联系绘制出来并进行可视化。
    
    2. ### Nodes in ROS2
    在ROS里每个node的用途,应该负责单一模块(列如一个node为控制轮电机，一个node为激光测距仪等等)。
    每个node能通过主题，服务，动作或参数向其它的node发送和接收数据。
    ![Alt Text](http://docs.ros.org/en/galactic/_images/Nodes-TopicandService.gif) 
    
    一个完整的机器人系统由很多协同工作的node所组成。
    在ROS2中，一个单一可执行文件(C++程序，python程序等等)能容纳一个或多个node。
    
- ## 先决条件
    一如既往
    
- ## 任务
